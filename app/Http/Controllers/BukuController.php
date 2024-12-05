<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\JenisUser;
use App\Models\Menu;
use App\Models\SettingMenuUser;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        $menus = Menu::all();
        return view('buku.index', compact('buku','menus'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $menus = Menu::all();
        return view('buku.create', compact('kategori','menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'kode' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        $menus = SettingMenuUser::all();
        return view('buku.edit', compact('buku', 'kategori','menus'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect()->route('buku.index');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index');
    }

    public function indexForAdmin()
    {
        $buku = Buku::all(); // Ambil semua data buku untuk admin
        $menus = Menu::all();
        return view('buku.index', compact('buku','menus'));
    }

    public function indexForUser()
    {
        $buku = Buku::all(); // Ambil semua data buku untuk user
        $menus = Menu::all();
        return view('buku.input', compact('buku','menus')); // Gunakan view berbeda untuk user
    }

}
