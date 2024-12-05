<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use App\Models\Menu;
use App\Models\SettingMenuUser;
use Illuminate\Http\Request;

class SettingMenuUserController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $menuu = Menu::all();
        $settings = SettingMenuUser::with(['jenisUser', 'menu'])->get();
        return view('setting_menu_user.index', compact('settings', 'menus', 'menuu'));
    }

    public function create()
    {
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();
        return view('setting_menu_user.create', compact('jenisUsers', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_JENIS_USER' => 'required|exists:jenis_user,id',
            'MENU_ID' => 'required|exists:menu,id',
        ]);

        SettingMenuUser::create([
            'ID_JENIS_USER' => $request->ID_JENIS_USER,
            'MENU_ID' => $request->MENU_ID,
            'CREATE_BY' => auth()->user()->id, // Sesuai skema foreign key ke id user
            'CREATE_DATE' => now(),
        ]);

        return redirect()->route('setting_menu_user.index')->with('success', 'Setting Menu User berhasil dibuat.');
    }

    public function edit($id)
    {
        $settings = SettingMenuUser::findOrFail($id);
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();
        return view('setting_menu_user.edit', compact('settings', 'jenisUsers', 'menus'));
    }

    public function update(Request $request, $id)
    {
        // Langkah 1: Validasi input
        $request->validate([
            'ID_JENIS_USER' => 'required|exists:jenis_user,id',
            'MENU_ID' => 'required|exists:menu,id',
        ]);

        // Langkah 2: Temukan setting berdasarkan ID
        $settings = SettingMenuUser::find($id);

        // Langkah 3: Coba update data, tapi arahkan ke index apapun hasilnya
        if ($settings) {
            $settings->ID_JENIS_USER = $request->ID_JENIS_USER;
            $settings->MENU_ID = $request->MENU_ID;
            $settings->UPDATE_BY = auth()->user()->id;
            $settings->UPDATE_DATE = now();
            $settings->save();
        }

        // Langkah 4: Redirect ke halaman index tanpa memperhatikan hasil save
        return redirect()->route('setting_menu_user.index')->with('success', 'Setting Menu User berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $settings = SettingMenuUser::findOrFail($id);
        $settings->delete();
        return redirect()->route('setting_menu_user.index')->with('success', 'Setting Menu User berhasil dihapus.');
    }
}
