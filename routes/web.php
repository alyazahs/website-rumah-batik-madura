<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatikController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/katalog', function () {
    return view('katalog');
})->name('katalog');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/katalog', [BatikController::class, 'index'])->name('katalog');


// Route::get('/', function () {
//     return view('welcome');
// });
