<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
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

        // Mengambil log aktivitas terbaru
        $log = Activity::with('causer') // Relasi dengan user yang menyebabkan aktivitas
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('totalProduct', 'totalUser', 'totalCategory', 'log'));
    }
}
