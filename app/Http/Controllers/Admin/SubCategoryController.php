<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function store(Request $request, $category_id)
    {
        $request->validate([
            'nameSubCategory' => 'required|string|max:255',
        ]);
    
        SubCategory::create([
            'nameSubCategory' => $request->nameSubCategory,
            'user_id' => Auth::id(),
            'category_id' => $category_id,
        ]);
    
        return back()->with('success', 'Subkategori berhasil ditambahkan.');
    }    

    public function update(Request $request, Category $category, SubCategory $subcategory)
    {
        $request->validate([
            'nameSubCategory' => 'required|string|max:255',
        ]);

        $subcategory->update([
            'nameSubCategory' => $request->nameSubCategory,
        ]);

        return back()->with('success', 'Subkategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sub = SubCategory::findOrFail($id);
        $sub->delete();

        return back()->with('success', 'Subkategori berhasil dihapus.');
    }
}
