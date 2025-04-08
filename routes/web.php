<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\productController;
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

// product
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
});

// Manajemen Admin (Kelola user)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::get('user/log', [\App\Http\Controllers\Admin\UserController::class, 'log'])->name('admin.logs');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route edit profile
    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

    // Route ganti password
    Route::get('profile/password', [\App\Http\Controllers\Admin\ProfileController::class, 'password'])->name('profile.password');
    Route::put('profile/password', [\App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('profile.password.update');
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
