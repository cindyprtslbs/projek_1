<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\JenisUser;
use App\Models\Menu;
use App\Models\SettingMenuUser;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $menus = Menu::all();
        return view('kategori.index', compact('kategori','menus'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('kategori.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully');
    }

}
