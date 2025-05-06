<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function home()
    {
        $latestProducts = Product::latest()->take(5)->get();
        return view('home', compact('latestProducts'));
    }

    public function __construct()
    {
        // Pastikan $categories tersedia untuk semua view
        $categories = Category::with('subCategories')->get();
        view()->share('categories', $categories);
    }

    public function index(Request $request)
    {
        $subCategories = SubCategory::all();
        $products = Product::with('subCategory.category');
        
        if ($request->has('jenis') && $request->jenis != '') {
            $products->where('sub_category_id', $request->jenis);
        }
        
        $products = $products->paginate(12);
        
        return view('catalog', [
            'subCategories' => $subCategories,
            'products' => $products,
            'subCategoryId' => $request->jenis ?? null
        ]);
    }

    public function category($categoryId)
    {
        $category = Category::with('subCategories')->findOrFail($categoryId);
        $subCategories = $category->subCategories;
        
        $products = Product::with('subCategory')
                         ->whereHas('subCategory', fn($q) => $q->where('category_id', $categoryId))
                         ->paginate(12);

        return view('catalog', compact('category', 'subCategories', 'products'));
    }

    public function subCategory($subCategoryId)
    {
        $subCategory = SubCategory::with('category')->findOrFail($subCategoryId);
        $subCategories = SubCategory::where('category_id', $subCategory->category_id)->get();
        
        $products = Product::with('subCategory')
                         ->where('sub_category_id', $subCategoryId)
                         ->paginate(12);

        return view('catalog', [
            'subCategory' => $subCategory,
            'subCategories' => $subCategories,
            'products' => $products,
            'subCategoryId' => $subCategoryId
        ]);
    }
}