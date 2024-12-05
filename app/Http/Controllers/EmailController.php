<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class EmailController extends Controller
{
    public function index()
    {

        $menus = Menu::all();
        return view('email', compact('menus'));
    }
}
