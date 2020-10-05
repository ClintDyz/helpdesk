<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Setting;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $menuList = Menu::orderBy('order')->get();
        $menus = [];
        $itemCount = 0;
        $slideNo = 0;

        if (count($menuList) > 0) {
            foreach ($menuList as $menu) {
                $menus[$slideNo][$itemCount] = $menu;

                $itemCount++;

                if ($itemCount == 4) {
                    $itemCount == 0;
                    $slideNo++;
                }
            }
        }

        return view('menu.index', compact('menus'));
    }

    public function about() {
        $config = Setting::orderBy('id', 'desc')->first();
        return view('about', compact('config'));
    }
}
