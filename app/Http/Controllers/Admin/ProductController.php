<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::with(['subCategory.category', 'user'])
            ->latest()
            ->when($search, function ($query) use ($search) {
                return $query->where('nameProduct', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%")
                             ->orWhereHas('subCategory', function ($subQuery) use ($search) {
                                 $subQuery->where('nameSubCategory', 'like', "%{$search}%")
                                          ->orWhereHas('category', function ($catQuery) use ($search) {
                                              $catQuery->where('nameCategory', 'like', "%{$search}%");
                                          });
                             });
            })
            ->paginate(10); // Tetap menggunakan pagination

        $subcategories = SubCategory::with('category')->get();

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
    
        $product = Product::create([
            'nameProduct' => $request->nameProduct,
            'description' => $request->description,
            'price' => $request->price,
            'path' => $imagePath,
            'status' => $request->status,
            'user_id' => auth::id(),
            'sub_category_id' => $request->sub_category_id,
        ]);

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($product)
            ->log('Added a new product: ' . $product->nameProduct);
    
        return back()->with('success', 'Produk berhasil ditambahkan.');
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldName = $product->nameProduct;
    
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

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($product)
            ->log('Edited product: ' . $oldName . ' to ' . $product->nameProduct);
    
        return back()->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $productName = $product->nameProduct;
        $product->delete();

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($product)
            ->log('Deleted product: ' . $productName);

        return back()->with('success', 'Produk berhasil dihapus.');
    }
}
