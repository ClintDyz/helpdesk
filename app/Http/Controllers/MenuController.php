<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Menu;

use DB;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug) {
        $menuList = Menu::where('slug', $slug)->first();
        $submenus = unserialize($menuList->sub_menus);
        return view('sub-menu.index', compact('submenus'));
    }

    public function indexBackend() {
        $menus = Menu::orderBy('name')->paginate(15);

        /*
        if (Auth::user()->role == 'employee') {
            $menus = Menu::where('created_by', Auth::user()->id)
                         ->orderBy('name')->paginate(15);
        }*/

        return view('menu.index-backend', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = json_decode($request->sub_menus);
        $files = $request->file('files');

        if ($data) {
            $menuName = $data->name;
            $slug = $this->generateSlug($menuName);
            $menuDescription = $data->description;
            $menuPhoto = $data->photo;

            if (!$this->checkIfDuplicateSlug($slug)) {
                try {
                    $countTotalMenu = DB::table('cc_menus')->count();
                    $order = $countTotalMenu + 1;

                    $instanceMenu = new Menu;
                    $instanceMenu->order = $order;
                    $instanceMenu->slug = $slug;
                    $instanceMenu->name = $menuName;
                    $instanceMenu->description = $menuDescription;
                    $instanceMenu->sub_menus = serialize([]);
                    $instanceMenu->created_by = Auth::user()->id;
                    $instanceMenu->save();

                    $getLastMenuID = DB::table('cc_menus')->orderBy('id', 'desc')->first();
                    $getLastMenuID = $getLastMenuID->id;

                    $file = $this->getFileObjByFilename($menuPhoto, $files);
                    $menuPhoto = $this->uploadFile($file, $getLastMenuID);
                    $subMenu = $this->getSerializedSubmenu($data, $files, $getLastMenuID);

                    $instanceMenu = Menu::find($getLastMenuID);
                    $instanceMenu->sub_menus = $subMenu;
                    $instanceMenu->photo = $menuPhoto;
                    $instanceMenu->timestamps = false;
                    $instanceMenu->save();

                    $msg = Auth::user()->firstname . " successfully created the $menuName menu.";
                    return redirect()->route('menu.index')->with('success', $msg);
                } catch (\Throwable $th) {
                    $msg = "Unknown error, try again.";
                    return redirect()->route('menu.index')->with('failed', $msg);
                }
            } else {
                $msg = "$menuName has duplicate.";
                return redirect()->route('menu.index')->with('failed', $msg);
            }
        } else {
            $msg = "No data, try again.";
            return redirect()->route('menu.index')->with('failed', $msg);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $menu = Menu::find($id);
        $submenus = unserialize($menu->sub_menus);
        //dd($submenus);
        return view('menu.update', compact(
            'id', 'menu', 'submenus'
        ));
    }

    public function editOrder() {
        $menuList = Menu::orderBy('order')->get();
        return view('menu.update-order', compact(
            'menuList',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $data = json_decode($request->sub_menus);
        $files = $request->file('files');

        if ($data) {
            $this->moveAllFilesTemp($id);

            $menuName = $data->name;
            $slug = $this->generateSlug($menuName);
            $menuDescription = $data->description;
            $menuPhoto = $data->photo;

            if (!$this->checkIfDuplicateSlug($slug, $id)) {
                try {
                    $subMenu = $this->getSerializedSubmenu($data, $files, $id);

                    $instanceMenu = Menu::find($id);
                    $instanceMenu->slug = $slug;
                    $instanceMenu->name = $menuName;
                    $instanceMenu->description = $menuDescription;
                    $instanceMenu->sub_menus = $subMenu;

                    if ($menuPhoto) {
                        $file = $this->getFileObjByFilename($menuPhoto, $files);
                        $menuPhoto = $this->uploadFile($file, $id);
                        $instanceMenu->photo = $menuPhoto;
                    } else {
                        $filename = str_replace("storage/files/menu/$id/", '', $instanceMenu->photo);
                        $this->restoreFileFromTemp($filename, $id);
                    }

                    $instanceMenu->save();

                    $this->deleteAllFiles($id, true);

                    $msg = Auth::user()->firstname . " successfully updated the $menuName menu.";
                    return redirect()->route('menu.index')->with('success', $msg);
                } catch (\Throwable $th) {
                    $msg = "Unknown error, try again.";
                    return redirect()->route('menu.index')->with('failed', $msg);
                }
            } else {
                $msg = "$menuName has duplicate.";
                return redirect()->route('menu.index')->with('failed', $msg);
            }
        } else {
            $msg = "No data, try again.";
            return redirect()->route('menu.index')->with('failed', $msg);
        }
    }

    public function updateOrder(Request $request) {
        $orders = explode(',', $request->order);

        try {
            foreach ($orders as $order => $slug) {
                $menu = Menu::where('slug', $slug)->first();
                $menu->order = $order + 1;
                $menu->save();
            }

            $msg = Auth::user()->firstname . " successfully updated order of menu.";
            return redirect()->route('menu.index')->with('success', $msg);
        } catch (\Throwable $th) {
            $msg = "Unknown error, try again.";
            return redirect()->route('menu.index')->with('failed', $msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            //Menu::where('id', $id)->delete();
            $menu = Menu::find($id);
            $menuName = $menu->name;
            Menu::destroy($id);

            $msg = Auth::user()->firstname . " successfully deleted the $menuName menu.";
            return redirect()->route('menu.index')->with('success', $msg);

        } catch (\Throwable $th) {
            $msg = "Unknown error, try again.";
            return redirect()->route('menu.index')->with('failed', $msg);
        }
    }

    private function getSerializedSubmenu($data, $files, $id) {
        $subMenus = [];

        if (count($data->sub_menu) > 0) {
            foreach ($data->sub_menu as $subCtr1 => $sub1) {
                $hasFileLink = isset($sub1->has_file_link) ? $sub1->has_file_link : false;
                $fileLink = isset($sub1->file_link) ? $sub1->file_link : NULL;
                $isRestored = false;

                if (!$hasFileLink && !$sub1->has_sub_menu) {
                    $file = $this->getFileObjByFilename($sub1->file_link, $files);

                    if (isset($sub1->old_path) && $sub1->old_path && !$file) {
                        $filename = str_replace("storage/files/menu/$id/", '', $sub1->old_path);
                        $isRestored = $this->restoreFileFromTemp($filename, $id);
                        $fileLink = $sub1->old_path;
                    } else {
                        $fileLink = $this->uploadFile($file, $id);
                    }
                }

                echo "Level 2 - $subCtr1 -- $fileLink -- $isRestored<br>";

                $subMenus[$subCtr1] = [
                    'name' => $sub1->name,
                    'slug' => $this->generateSlug($sub1->name),
                    'has_sub_menu' => $sub1->has_sub_menu,
                    'has_file_link' => $hasFileLink,
                    'file_link' => $fileLink,
                    'sub_menu' => []
                ];

                if ($sub1->has_sub_menu === TRUE && count($sub1->sub_menu) > 0) {
                    foreach ($sub1->sub_menu as $subCtr2 => $sub2) {
                        $hasFileLink = isset($sub2->has_file_link) ? $sub2->has_file_link : false;
                        $fileLink = isset($sub2->file_link) ? $sub2->file_link : NULL;
                        $isRestored = false;

                        if (!$hasFileLink && !$sub2->has_sub_menu) {
                            $file = $this->getFileObjByFilename($sub2->file_link, $files);

                            if (isset($sub2->old_path) && $sub2->old_path && !$file) {
                                $filename = str_replace("storage/files/menu/$id/", '', $sub2->old_path);
                                $isRestored = $this->restoreFileFromTemp($filename, $id);
                                $fileLink = $sub2->old_path;
                            } else {
                                $fileLink = $this->uploadFile($file, $id);
                            }
                        }

                        echo "-----Level 3 - $subCtr2 -- $fileLink -- $isRestored<br>";

                        $subMenus[$subCtr1]['sub_menu'][$subCtr2] = [
                            'name' => $sub2->name,
                            'slug' => $this->generateSlug($sub2->name),
                            'has_sub_menu' => $sub2->has_sub_menu,
                            'has_file_link' => $hasFileLink,
                            'file_link' => $fileLink,
                            'sub_menu' => []
                        ];

                        if ($sub2->has_sub_menu === TRUE && count($sub2->sub_menu) > 0) {
                            foreach ($sub2->sub_menu as $subCtr3 => $sub3) {
                                $hasFileLink = isset($sub3->has_file_link) ? $sub3->has_file_link : false;
                                $fileLink = isset($sub3->file_link) ? $sub3->file_link : NULL;
                                $isRestored = false;

                                if (!$hasFileLink && !$sub3->has_sub_menu) {
                                    $file = $this->getFileObjByFilename($sub3->file_link, $files);

                                    if (isset($sub3->old_path) && $sub3->old_path && !$file) {
                                        $filename = str_replace("storage/files/menu/$id/", '', $sub3->old_path);
                                        $isRestored = $this->restoreFileFromTemp($filename, $id);
                                        $fileLink = $sub3->old_path;
                                    } else {
                                        $fileLink = $this->uploadFile($file, $id);
                                    }
                                }

                                echo "----------Level 4 - $subCtr3 -- $fileLink -- $isRestored<br>";

                                $subMenus[$subCtr1]['sub_menu'][$subCtr2]['sub_menu'][$subCtr3] = [
                                    'name' => $sub3->name,
                                    'slug' => $this->generateSlug($sub3->name),
                                    'has_sub_menu' => $sub3->has_sub_menu,
                                    'has_file_link' => $hasFileLink,
                                    'file_link' => $fileLink,
                                    'sub_menu' => []
                                ];
                            }
                        }
                    }
                }
            }
        }

        return serialize($subMenus);
    }

    private function generateSlug($text) {
        $splitText = preg_split("/[^a-zA-Z0-9]+/", $text);
        $splitText = array_filter($splitText);
        $slug = implode("-",$splitText);

        return strtolower($slug);
    }

    private function getFileObjByFilename($filename, $files) {
        if (is_array($files) && count($files)) {
            foreach ($files as $file) {
                if ($file->getClientOriginalName() == $filename) {
                    return $file;
                }
            }
        }

        return NULL;
    }


    private function uploadFile($file, $id) {
        $path = NULL;

        if ($file) {
            $newFileName = uniqid().File::extension($file->getClientOriginalName());
            Storage::put("public/files/menu/$id/$newFileName", file_get_contents($file));
            $path = "storage/files/menu/$id/$newFileName";
        }

        return $path;
    }

    private function deleteAllFiles($id, $isTemp = false) {
        if (!$isTemp) {
            $response = Storage::deleteDirectory("public/files/menu/$id");
        } else {
            $response = Storage::deleteDirectory("public/temp/menu/$id");
        }

        return $response;
    }

    private function moveAllFilesTemp($id) {
        $response = false;
        $oldPath = "public/files/menu/$id";
        $newPath = "public/temp/menu/$id";

        if (Storage::exists($oldPath)) {
            $response = Storage::move($oldPath, $newPath);
        }

        return $response;
    }

    private function restoreFileFromTemp($filename, $id) {
        $response = false;
        $oldPath = "public/temp/menu/$id/$filename";
        $newPath = "public/files/menu/$id/$filename";

        if (Storage::exists($oldPath)) {
            $response = Storage::move($oldPath, $newPath);
        }

        return $response;
    }

    private function checkIfDuplicateSlug($slug, $id = 0) {
        if (!$id) {
            $menuCount = DB::table('cc_menus')->where('slug', $slug)->count();
            return $menuCount ? true : false;
        } else {
            $menu = DB::table('cc_menus')->where('slug', $slug)->first();
            return $menu->id != $id ? true : false;
        }
    }
}
