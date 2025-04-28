<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $categories = Category::all();  // Ambil semua kategori
        $products = Product::with('subCategory.category')  // Relasi untuk SubCategory dan Category
                           ->paginate(12);  // Ambil produk dengan pagination 12 per halaman

        return view('catalog', compact('categories', 'products'));
    }

    // Menampilkan produk berdasarkan kategori
    public function category($categoryId)
    {
        $categories = Category::all(); // Pastikan kategori tetap ada
        $category = Category::findOrFail($categoryId);
        $subCategories = SubCategory::where('category_id', $categoryId)->get();
        $products = Product::with('subCategory')
                           ->whereHas('subCategory', function ($query) use ($categoryId) {
                               $query->where('category_id', $categoryId);
                           })
                           ->paginate(12);

        return view('catalog', compact('categories', 'category', 'subCategories', 'products'));
    }

    // Menampilkan produk berdasarkan subkategori
    public function subCategory($subCategoryId)
    {
        $categories = Category::all(); // Pastikan kategori tetap ada
        $subCategory = SubCategory::findOrFail($subCategoryId);
        $products = Product::with('subCategory')
                           ->where('sub_category_id', $subCategoryId)
                           ->paginate(12);

        return view('catalog', compact('categories', 'subCategory', 'products'));
    }
}
