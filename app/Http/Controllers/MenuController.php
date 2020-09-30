<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $menus = Menu::orderBy('name')->get();
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
                //return redirect()->route('menu.index')->with('success', $msg);
            } catch (\Throwable $th) {
                $msg = "Unknown error, try again.";
                //return redirect()->route('menu.index')->with('failed', $msg);
            }
        } else {
            $msg = "No data, try again.";
            //return redirect()->route('menu.index')->with('failed', $msg);
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

        dd($request);
        /*
        if ($data) {
            $menuName = $data->name;
            $slug = $this->generateSlug($menuName);
            $menuDescription = $data->description;
            $menuPhoto = $data->photo;

            try {
                $this->deleteAllFiles($id);
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
                }

                $instanceMenu->save();

                $msg = Auth::user()->firstname . " successfully updated the $menuName menu.";
                //return redirect()->route('menu.index')->with('success', $msg);
            } catch (\Throwable $th) {
                $msg = "Unknown error, try again.";
                //return redirect()->route('menu.index')->with('failed', $msg);
            }
        } else {
            $msg = "No data, try again.";
            //return redirect()->route('menu.index')->with('failed', $msg);
        }
        */
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

                if (!$hasFileLink && !$sub1->has_sub_menu) {
                    $file = $this->getFileObjByFilename($sub1->file_link, $files);
                    $fileLink = $file ? $this->uploadFile($file, 'document', $id) : $sub1->file_link;
                }

                echo "Level 2 - $subCtr1 $fileLink<br>";

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

                        if (!$hasFileLink && !$sub2->has_sub_menu) {
                            $file = $this->getFileObjByFilename($sub2->file_link, $files);
                            $fileLink = $file ? $this->uploadFile($file, $id) : $sub2->file_link;
                        }

                        echo "-----Level 3 $fileLink<br>";

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

                                if (!$hasFileLink && !$sub3->has_sub_menu) {
                                    $file = $this->getFileObjByFilename($sub3->file_link, $files);
                                    $fileLink = $file ? $this->uploadFile($file, $id) : $sub3->file_link;
                                }

                                echo "----------Level 4 $fileLink<br>";

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
        foreach ($files as $file) {
            if ($file->getClientOriginalName() == $filename) {
                return $file;
            }
        }

        return NULL;
    }


    private function uploadFile($file, $id) {
        $path = NULL;

        if ($file) {
            $newFileName = $file->getClientOriginalName();
            Storage::put("public/files/menu/$id/$newFileName",
                         file_get_contents($file->getRealPath()));
            $path = "storage/files/menu/$id/$newFileName";

            /*
            if ($type == 'image') {
                Image::configure(['driver' => 'gd']);

                $newFileName = $file->getClientOriginalName();
                $path = "storage/files/menu/$id/$newFileName";
                $image = Image::make($file)->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put("public/files/menu/$id/$newFileName", (string) $image->encode());
            } else {
                $newFileName = $file->getClientOriginalName();
                Storage::put("public/files/menu/$id/$newFileName",
                            file_get_contents($file->getRealPath()));
                $path = "storage/files/menu/$id/$newFileName";
            }*/
        }

        return $path;
    }

    private function deleteAllFiles($id) {
        $response = Storage::deleteDirectory("public/files/menu/$id");
        return $response;
    }
}
