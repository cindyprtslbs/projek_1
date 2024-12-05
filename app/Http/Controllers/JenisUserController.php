<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisUser;
use App\Models\Menu;
use App\Models\SettingMenuUser;

class JenisUserController extends Controller
{

    public function index()
    {
        // Ambil semua data jenis_user
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();

        return view('admin.jenisuser.index', compact('jenisUsers','menus')); // Kirim data ke view
    }

    public function create()
    {
        $menus = Menu::all();
        $jenisUsers = JenisUser::all();
        return view('admin.jenisuser.create', compact('menus','jenisUsers')); // Tampilkan form untuk menambah jenis_user
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'jenis_user' => 'required|string|max:255',
    ]);

    // Tambah data jenis_user baru
    JenisUser::create([
        'jenis_user' => $request->input('jenis_user'),
        'create_by' => auth()->user()->id ?? 1, // Set default jika auth tidak tersedia
        'create_date' => now(),
        'delete_mark' => 0, // Set default jika diperlukan
    ]);

    return redirect()->route('jenis-user.index')->with('success', 'Jenis user berhasil ditambahkan.');
}


    public function edit($id)
    {
        $jenisUser = JenisUser::findOrFail($id); // Ambil jenis_user berdasarkan ID
        $menus = Menu::all();
        return view('admin.jenisuser.edit', compact('jenisUser','menus')); // Tampilkan form untuk mengedit
    }

    public function update(Request $request, $id)
{
    // Validasi data
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Temukan jenis_user berdasarkan ID
    $jenisUser = JenisUser::findOrFail($id);

    // Perbarui data jenis_user yang ditemukan
    $jenisUser->update([
        'jenis_user' => $request->input('name'),
        'update_by' => auth()->user()->id ?? 1, // Atur sesuai kebutuhan
        'update_date' => now(),
    ]);

    return redirect()->route('jenis-user.index')->with('success', 'Jenis user berhasil diperbarui.');
}

    public function destroy($id)
    {
        $jenisUser = JenisUser::findOrFail($id); // Ambil jenis_user berdasarkan ID
        $jenisUser->delete(); // Hapus jenis_user

        return redirect()->route('jenis-user.index')->with('success', 'Jenis user berhasil dihapus.');
    }
}
