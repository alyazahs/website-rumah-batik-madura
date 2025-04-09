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
        $products = Product::with('subCategory')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $subCategories = SubCategory::all();
        return view('admin.product.create', compact('subCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameProduct' => 'required|string|max:50',
            'description' => 'nullable|string|max:512',
            'price' => 'required|integer',
            'sub_category_id' => 'required|exists:sub_category,idSubCategory',
            'status' => 'required|in:active,inactive'
        ]);

        Product::create([
            'user_id' => Auth::id(),
            'sub_category_id' => $request->sub_category_id,
            'nameProduct' => $request->nameProduct,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'path' => null // jika belum upload gambar
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $subCategories = SubCategory::all();
        return view('admin.product.edit', compact('product', 'subCategories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nameProduct' => 'required|string|max:50',
            'description' => 'nullable|string|max:512',
            'price' => 'required|integer',
            'sub_category_id' => 'required|exists:sub_category,idSubCategory',
            'status' => 'required|in:active,inactive'
        ]);

        $product->update([
            'sub_category_id' => $request->sub_category_id,
            'nameProduct' => $request->nameProduct,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
