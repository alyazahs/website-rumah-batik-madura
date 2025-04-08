<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function log()
    {
        return view('admin.user.log');
    }

    // Tambahkan create/store/edit/update/destroy jika diperlukan
}
