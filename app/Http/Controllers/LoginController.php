<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Menu;
use App\Models\JenisUser;
use App\Models\SettingMenuUser;
use App\Models\Buku;

class LoginController extends Controller
{
    public function landing()
    {
        $buku = Buku::all();
        $menus = Menu::all();
        return view('index', compact('menus', 'buku'));
    }
    public function dashboard()
    {
        $buku = Buku::all();
        $menus = Menu::all();
        return view('guest.dashboard', compact('menus', 'buku'));
    }
    public function Login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

    // Mengambil data login (email dan password)
    $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check the user's role and redirect accordingly
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role === 'guest') {
                return redirect()->route('guest.dashboard'); // Guest route
            } elseif (Auth::user()->role === 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ])->onlyInput('email');

        // if (Auth::check()) {
        //     return redirect()->route('dashboard'); // Arahkan ke dashboard jika sudah login
        // }
    }

    public function Register(Request $request){
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guest',
            'id_jenis_user' => 2,
        ]);

        // if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('login');
        // }

        // auth()->login($user);

        Auth::login($user);

        return redirect()->route('guest.dashboard');
    }
    public function Logout(Request $request)
    {
        // Proses logout
        Auth::logout();

        // Hapus data sesi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan pengguna ke halaman login atau halaman lain setelah logout
        return redirect('/')->with('status', 'Anda telah berhasil logout.');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('buku.index'); // Halaman CRUD untuk Admin
        } else {
            return redirect()->route('buku.input'); // Halaman input untuk User
        }
    }




}
