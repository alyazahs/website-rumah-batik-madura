<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\LogController;

// ===========================
// PUBLIC ROUTES
// ===========================

// Halaman utama
Route::get('/', [CatalogController::class, 'home'])->name('home');

// Halaman catalog
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/category/{categoryId}', [CatalogController::class, 'category'])->name('catalog.category');
Route::get('/catalog/subcategory/{subCategoryId}', [CatalogController::class, 'subCategory'])->name('catalog.subcategory');

// Halaman tentang
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// ===========================
// AUTHENTICATION ROUTES
// ===========================

// Login untuk admin (menggunakan guard: admin)
Route::middleware(['guest.admin'])->group(function () {
    Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
});

// Admin Dashboard & Logout (butuh auth:admin)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::match(['get', 'post'], '/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Lupa Password Admin
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

// ===========================
// ADMIN PANEL ROUTES
// ===========================

Route::get('/admin', function () {
    if (auth('web')->check()) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('admin.login');
    }
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    // Kategori
    Route::resource('category', CategoryController::class)
        ->parameters(['category' => 'category:idCategory']);

    // Subkategori
    Route::post('subcategory/{category_id}', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::put('subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::delete('subcategory/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');

    // Produk
    Route::resource('product', ProductController::class)
        ->parameters(['product' => 'product:idProduct']);

    // Profile
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Ganti password
    Route::get('profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Manajemen User & Log hanya untuk SuperAdmin
    Route::middleware(['isSuperAdmin'])->group(function () {
        Route::resource('user', UserController::class);
        Route::get('log', [UserController::class, 'log'])->name('admin.logs');
        Route::delete('log', [LogController::class, 'delete'])->name('admin.logs.delete');
        Route::get('/admin/logs/filter', [LogController::class, 'filter'])->name('admin.logs.filter');
    });
});
