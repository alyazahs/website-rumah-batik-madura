<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::with(['subCategory.category', 'user'])
            ->where('user_id', auth::id())
            ->latest()
            ->get();
    
        $subcategories = \App\Models\SubCategory::with('category')
            ->where('user_id', auth::id())
            ->get();
    
        return view('admin.product.index', compact('products', 'subcategories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nameProduct' => 'required|string|max:50',
            'description' => 'nullable|string|max:512',
            'price' => 'required|integer|min:0',
            'sub_category_id' => 'required|exists:sub_category,idSubCategory',
            'status' => 'required|in:Available,Sold',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Tambahan validasi gambar
        ]);
    
        $imagePath = null;
        if ($request->hasFile('path')) {
            $imagePath = $request->file('path')->store('products', 'public');
        }
    
        Product::create([
            'nameProduct' => $request->nameProduct,
            'description' => $request->description,
            'price' => $request->price,
            'path' => $imagePath,
            'status' => $request->status,
            'user_id' => auth::id(),
            'sub_category_id' => $request->sub_category_id,
        ]);
    
        return back()->with('success', 'Produk berhasil ditambahkan.');
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $request->validate([
            'nameProduct' => 'required|string|max:50',
            'description' => 'nullable|string|max:512',
            'price' => 'required|integer|min:0',
            'sub_category_id' => 'required|exists:sub_category,idSubCategory',
            'status' => 'required|in:Available,Sold',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = $product->path;
        if ($request->hasFile('path')) {
            $imagePath = $request->file('path')->store('products', 'public');
        }
    
        $product->update([
            'nameProduct' => $request->nameProduct,
            'description' => $request->description,
            'price' => $request->price,
            'path' => $imagePath,
            'status' => $request->status,
            'sub_category_id' => $request->sub_category_id,
        ]);
    
        return back()->with('success', 'Produk berhasil diperbarui.');
    }
}    