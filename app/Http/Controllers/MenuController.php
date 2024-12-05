<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuLevel;
use App\Models\JenisUser;
use App\Models\SettingMenuUser;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::with('level')->get();
        $menus = Menu::all();
        return view('menu.index', compact('menu','menus'));
    }

    public function create()
    {
        $levels = MenuLevel::all();
        $menus = Menu::all();
        return view('menu.create', compact('levels','menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required',
            'menu_link' => 'required',
            'menu_icon' => 'required',
            'level' => 'required|exists:menu_level,id',
            'create_date' => now(),
        ]);

        Menu::create($request->all());

        return redirect()->route('menu.index');
    }


    public function edit($id)
    {
        $menu = Menu::find($id);
        $levels = MenuLevel::all();
        $menus = Menu::all();
        return view('menu.edit', compact('menu', 'levels','menus'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'menu_name' => 'required',
        //     'menu_link' => 'required',
        //     'menu_icon' => 'required',
        //     'level' => 'required|exists:menu_levels,id',
        // ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('menu.index')->with('success', 'Menu updated successfully');

    }

    public function showMenu()
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Mengambil ID jenis user
        $idJenisUser = $user->id_jenis_user;

        // Mengambil menu yang diizinkan untuk jenis user ini
        $menus = Menu::whereHas('settingMenuUser', function ($query) use ($idJenisUser) {
            $query->where('id_jenis_user', $idJenisUser);
        })->get();

        return view('myview.sidebar', compact('menus'));
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully');
    }
}
