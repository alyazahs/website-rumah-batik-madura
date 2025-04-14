<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Log; // Import model Log
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['subCategories.user', 'user'])
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

        $category = Category::create([
            'user_id' => Auth::id(),
            'nameCategory' => $request->nameCategory,
        ]);

        Log::create([
            'user_id' => Auth::id(),
            'information' => 'added a new category: ' . $category->nameCategory,
            'time' => now(),
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

        $oldName = $category->nameCategory;
        $category->update([
            'nameCategory' => $request->nameCategory
        ]);

        Log::create([
            'user_id' => Auth::id(),
            'information' => 'edited a category: ' . $oldName . ' menjadi ' . $category->nameCategory,
            'time' => now(),
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $categoryName = $category->nameCategory;
        $category->delete();

        Log::create([
            'user_id' => Auth::id(),
            'information' => 'deleted a category: ' . $categoryName,
            'time' => now(),
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}