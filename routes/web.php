<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Katalog
Route::get('/katalog', function () {
    return view('katalog');
})->name('katalog');


// Tentang
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// Produk
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('produk', \App\Http\Controllers\Admin\ProdukController::class);
    Route::resource('kategori', \App\Http\Controllers\Admin\KategoriController::class);
});

// Manajemen Admin (Kelola Karyawan)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('karyawan', \App\Http\Controllers\Admin\KaryawanController::class);
    Route::get('karyawan/log', [\App\Http\Controllers\Admin\KaryawanController::class, 'log'])->name('admin.logs');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route edit profil
    Route::get('profil', [\App\Http\Controllers\Admin\ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('profil', [\App\Http\Controllers\Admin\ProfilController::class, 'update'])->name('profil.update');

    // Route ganti password
    Route::get('profil/password', [\App\Http\Controllers\Admin\ProfilController::class, 'password'])->name('profil.password');
    Route::put('profil/password', [\App\Http\Controllers\Admin\ProfilController::class, 'updatePassword'])->name('profil.password.update');
});


// ====== AUTHENTICATION ======
// Login Admin
Route::middleware(['guest.admin'])->group(function () {
    Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
});

// ====== ADMIN PANEL ======
// Middleware memastikan hanya admin yang bisa mengakses dashboard
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Logout Admin
    Route::match(['get', 'post'], '/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
});
