<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduct = Product::count();
        $totalUser = User::count();
        $totalCategory = Category::count();
        $log = Log::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalProduct', 'totalUser', 'totalCategory', 'log'));
    }
}
