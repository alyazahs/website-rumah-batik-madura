<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batik; 

class BatikController extends Controller
{
    public function index()
    {
        $batiks = Batik::all();  
        return view('katalog', compact('batiks'));
    }
}
