<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function store(Request $request, $category_id)
    {
        $request->validate([
            'nameSubCategory' => 'required|string|max:255',
        ]);
    
        $subCategory = SubCategory::create([
            'nameSubCategory' => $request->nameSubCategory,
            'user_id' => Auth::id(),
            'category_id' => $category_id,
        ]);

        Log::create([
            'user_id' => Auth::id(),
            'information' => 'added a new subkategory: ' . $subCategory->nameSubCategory . ' di kategori ID ' . $category_id,
            'time' => now(),
        ]);
    
        return back()->with('success', 'Subcategori berhasil ditambahkan.');
    }    

    public function update(Request $request, Category $category, SubCategory $subcategory)
    {
        $request->validate([
            'nameSubCategory' => 'required|string|max:255',
        ]);

        $oldName = $subcategory->nameSubCategory;
        $subcategory->update([
            'nameSubCategory' => $request->nameSubCategory,
        ]);

        Log::create([
            'user_id' => Auth::id(),
            'information' => 'edited a subcategory: ' . $oldName . ' menjadi ' . $subcategory->nameSubCategory . ' di kategori ID ' . $subcategory->category_id,
            'time' => now(),
        ]);

        return back()->with('success', 'Subkategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sub = SubCategory::findOrFail($id);
        $subName = $sub->nameSubCategory;
        $categoryId = $sub->category_id;
        $sub->delete();

        Log::create([
            'user_id' => Auth::id(),
            'information' => 'Deleted a subcategory: ' . $subName . ' dari kategori ID ' . $categoryId,
            'time' => now(),
        ]);

        return back()->with('success', 'Subkategori berhasil dihapus.');
    }
}
