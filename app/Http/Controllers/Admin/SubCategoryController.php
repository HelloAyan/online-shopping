<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    //

    public function index(){
        $subcategories = SubCategory::latest()->get();
        return view('admin.allsubcategory', compact('subcategories'));
    }

    public function AddSubCategory(){
        $category = Category::latest()->get();
        return view('admin.addsubcategory', compact('category'));
    }

    public function storeSubCategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required',
        ]);

       
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');

        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name,
        ]);

        Category::where('id', $category_id)->increment('subcategory_count', 1);

        return redirect()->route('allSubCategory')->with('message', 'Sub Category Added Successfully');
    }

    public function editSubCategory($id){
        $edit_sub_category = Subcategory::findOrFail($id);
        return view('admin.editsubcategory', compact('edit_sub_category'));
    }

    public function updateSubCategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
        ]);
        
        $sub_cat_id = $request->subcategory_id;

        Subcategory::findOrFail($sub_cat_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        return redirect()->route('allSubCategory')->with('message', 'Sub Category Updated Successfully');
    }

    public function deleteSubCategory($id){
        $category_id = Subcategory::where('id', $id)->value('category_id');
        Subcategory::findOrFail($id)->delete();
        Category::where('id', $category_id)->decrement('subcategory_count', 1);
        return redirect()->route('allSubCategory')->with('message', 'Sub Category Deleted Successfully');
    }
}