<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

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

        // Mencatat log aktivitas
        activity()
            ->causedBy(Auth::user())
            ->log('Added new category: ' . $category->nameCategory);

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

        $oldName = $category->nameCategory; // Menyimpan nama kategori lama

        $category->update([
            'nameCategory' => $request->nameCategory
        ]);

        // Mencatat log aktivitas
        activity()
            ->causedBy(Auth::user())
            ->log('Updated category: ' . $oldName . ' to ' . $category->nameCategory);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $categoryName = $category->nameCategory;

        $category->delete();

        // Mencatat log aktivitas
        activity()
            ->causedBy(Auth::user())
            ->log('Deleted category: ' . $categoryName);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
