<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('admin.produk.index');
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    // Tambahkan method lain seperti store, edit, update, destroy sesuai kebutuhan
}
