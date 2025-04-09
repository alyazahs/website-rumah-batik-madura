<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['subCategories.user', 'user']) // eager loading
            ->where('user_id', auth::id())
            ->latest()
            ->get();
    
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameCategory' => 'required|string|max:100'
        ]);

        Category::create([
            'user_id' => Auth::id(),
            'nameCategory' => $request->nameCategory,
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nameCategory' => 'required|string|max:100'
        ]);

        $category->update([
            'nameCategory' => $request->nameCategory
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
