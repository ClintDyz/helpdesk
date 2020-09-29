<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $menuList = Menu::orderBy('order')->get();
        return view('menu.index', compact('menuList'));
    }
}
