<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

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

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($subCategory)
            ->log('Added a new subcategory: ' . $subCategory->nameSubCategory . ' in category ID ' . $category_id);
    
        return back()->with('success', 'Subkategori berhasil ditambahkan.');
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

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($subcategory)
            ->log('Edited a subcategory: ' . $oldName . ' menjadi ' . $subcategory->nameSubCategory . ' in category ID ' . $subcategory->category_id);

        return back()->with('success', 'Subkategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sub = SubCategory::findOrFail($id);
        $subName = $sub->nameSubCategory;
        $categoryId = $sub->category_id;
        $sub->delete();

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($sub)
            ->log('Deleted a subcategory: ' . $subName . ' from category ID ' . $categoryId);

        return back()->with('success', 'Subkategori berhasil dihapus.');
    }
}
