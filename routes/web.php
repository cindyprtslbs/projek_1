<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Akses;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\MahasiswaMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SettingMenuUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('index2');
});

// admin
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/berita', [AdminController::class, 'show'])->name('berita');
    Route::get('/cuaca', [AdminController::class, 'show1'])->name('cuaca');


    Route::get('/jenis-user', [JenisUserController::class, 'index'])->name('jenis-user.index');
    Route::get('/jenis-user/create', [JenisUserController::class, 'create'])->name('jenis-user.create');
    Route::post('/jenis-user', [JenisUserController::class, 'store'])->name('jenis-user.store');
    Route::get('/jenis-user/{id}/edit', [JenisUserController::class, 'edit'])->name('jenis-user.edit');
    Route::put('/jenis-user/{id}', [JenisUserController::class, 'update'])->name('jenis-user.update');
    Route::delete('/jenis-user/{id}', [JenisUserController::class, 'destroy'])->name('jenis-user.destroy');

});
Route::middleware(['admin'])->group(function () {
    // Route::get('/setting-menu-user', [SettingMenuUserController::class, 'index'])->name('setting_menu_user.index');
    // Route::post('/setting-menu-user', [SettingMenuUserController::class, 'store'])->name('setting_menu_user.store');
Route::resource('setting_menu_user', SettingMenuUserController::class);
});


    Route::get('/dash', [DashboardController::class, 'index'])->name('dashboardq');


//Route::middleware(['auth', 'role:admin'])->get('/setting-menu-user', [SettingMenuUserController::class, 'index'])->name('setting_menu_user.index');

Route::middleware(['admin'])->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});



// guest
Route::middleware(['guest'])->group(function () {
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::get('/login', function () {
        return view('login');
    });
    Route::get('/guest/dashboard', [LoginController::class, 'dashboard'])->name('guest.dashboard');
    Route::post('/ProsesLogin', [LoginController::class, 'login'])->name('login');
    Route::post('/ProsesSimpan', [LoginController::class, 'Register']);
});

// mahasiswa
Route::middleware(['mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/user-menejemen', [UserManagementController::class, 'index'])->name('user-menejemen');
//     Route::get('/setting', [UserManagementController::class, 'index'])->name('setting');
//     Route::get('/menu-management', [UserManagementController::class, 'index'])->name('menu-management');
//     Route::get('/berita', [UserManagementController::class, 'index'])->name('berita');
//     Route::get('/koleksibuku', [UserManagementController::class, 'index'])->name('koleksibuku');
//     Route::get('/daftaruser', [UserManagementController::class, 'index'])->name('daftaruser');
// });

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('myview.header');
    // })->name('dashboard');


    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    // Kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('kategori/{id}', [BukuController::class, 'destroy'])->name('kategori.destroy');

    // Buku
    Route::get('buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    //Route::get('/buku/input', [BukuController::class, 'create'])->name('buku.input');
    Route::get('/buku', [BukuController::class, 'indexForAdmin'])->name('buku.index');
    Route::get('/buku/user', [BukuController::class, 'indexForUser'])->name('buku.input');


});

// Route::get('/page', function () {
//     return view('index');
// });

Route::get('/page', [LoginController::class, 'landing'])->name('page');

Route::middleware('auth')->group(function () {
    Route::get('/postings', [PostController::class, 'index'])->name('posts.index');
    Route::post('/postings', [PostController::class, 'store'])->name('posts.store');
    Route::post('/postings/{posting_id}/comment', [PostController::class, 'addComment'])->name('posts.comment');
    Route::post('/postings/{posting_id}/like', [PostController::class, 'like'])->name('posts.like');
    Route::delete('/posts/{posting_id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/email', [EmailController::class, 'index'])->name('email');


