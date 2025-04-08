<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('admin.karyawan.index');
    }

    public function log()
    {
        return view('admin.karyawan.log');
    }

    // Tambahkan create/store/edit/update/destroy jika diperlukan
}
