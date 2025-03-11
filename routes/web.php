<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BatikController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Katalog
Route::get('/katalog', [BatikController::class, 'index'])->name('katalog');

// Tentang
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// ====== AUTHENTICATION ======
// Login Admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// ====== ADMIN PANEL ======
// Middleware memastikan hanya admin yang bisa mengakses dashboard
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Logout Admin
    Route::match(['get', 'post'], '/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});