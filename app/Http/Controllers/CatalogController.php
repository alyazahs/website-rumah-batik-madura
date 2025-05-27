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
        $latestProducts = Product::latest()->take(6)->get();
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
        if ($request->filled('category')) {
            $subCategories = SubCategory::with('category')
                ->where('category_id', $request->category)
                ->get();
        } else {
            $subCategories = SubCategory::with('category')->get();
        }
        $products = Product::with('subCategory.category');
    
        if ($request->filled('category') && $request->filled('jenis')) {
            $products->whereHas('subCategory', function ($query) use ($request) {
                $query->where('category_id', $request->category)
                      ->where('idSubCategory', $request->jenis);
            });
        } elseif ($request->filled('category')) {
            $products->whereHas('subCategory', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            });
        } elseif ($request->filled('jenis')) {
            $products->whereHas('subCategory', function ($query) use ($request) {
                $query->where('idSubCategory', $request->jenis);
            });
        }
        
    
        $products = $products->paginate(12);
    
        return view('catalog', [
            'subCategories' => $subCategories,
            'products' => $products,
            'subCategoryId' => $request->jenis ?? null,
            'categoryId' => $request->category ?? null,
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

    public function show($id)
    {
        $product = Product::with('subCategory.category')->findOrFail($id);
        return view('product-detail', compact('product'));
    }

}