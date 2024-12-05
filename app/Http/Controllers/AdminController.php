<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisUser;
use App\Models\Menu;
use App\Models\SettingMenuUser;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $jenisUsers = JenisUser::all();
        $admin = User::with('jenis_user')->get();
        $menus = Menu::all();
        return view('admin.index', compact('admin','menus','jenisUsers'));

        $jenisUserId = auth()->user()->id_jenis_user;

        // $menus = SettingMenuUser::where('id_jenis_user', $jenisUserId)
        //                         ->with('menu')
        //                         ->get()
        //                         ->pluck('menu');

        // $jenis_user = JenisUser::find($user->id_jenis_user);

        // return view('admin.aksesmenu', compact('jenis_user','menus'));
    }

    public function create()
    {
        $jenisUser = JenisUser::all();
        $menus = Menu::all();
        return view('admin.create', compact('jenisUser', 'menus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'nullable|string',
            'id_jenis_user' => 'required|integer',
            'status_user' => 'required|string',
            'role' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->no_hp = $validatedData['no_hp'];
        $user->id_jenis_user = $validatedData['id_jenis_user'];
        $user->status_user = $validatedData['status_user'];
        $user->role = $validatedData['role'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        // foreach ($validatedData['menu'] as $menuId) {
        //     DB::table('setting_menu_user')->insert([
        //         'id_jenis_user' => $user->id_jenis_user,
        //         'id_menu' => $menuId,
        //         'status' => 1, // Set default status aktif
        //     ]);
        // }

        return redirect()->route('admin.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $admin = User::find($id);
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();
        return view('admin.edit', compact('admin', 'jenisUsers','menus'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:15',
            'id_jenis_user' => 'required|integer',
            'status_user' => 'required|string',
            'role' => 'required|string',
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Mengupdate data user
        $user->fill($validatedData);
        $user->save(); // Simpan data yang telah diupdate

        // Redirect dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'User berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->id === $user->id) {
            return redirect()->route('admin.index')->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        $user->delete();

        // Redirect ke route admin.index setelah berhasil menghapus user
        return redirect()->route('admin.index')->with('success', 'User berhasil dihapus.');
    }

    public function show()
    {
        $menus = Menu::all();
        return view('admin.gempa', compact('menus'));
    }

    public function show1()
    {
        $menus = Menu::all();
        return view('admin.cuaca', compact('menus'));
    }

}
