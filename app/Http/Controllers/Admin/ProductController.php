<?php

namespace App\Http\Controllers\Admin;

use App\Models\product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //

    public function index(){
        return view('admin.allproduct');
    }

    public function AddProduct(){
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    public function storeProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png,gif|max:5000',
        ]);

        
        $category_id = $request->product_category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');

        $subcategory_id = $request->product_subcategory_id;
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        $image = $request->file('img');
        $image_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->img->move(public_path('upload'), $image_name);
        $image_url = 'upload/' . $image_name;

        product::insert([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_category_name' => $category_name,
            'product_category_id' => $category_id,
            'product_sub_category_name' => $subcategory_name,
            'product_subcategory_id' => $subcategory_id,
            'img' => $image_url,
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        Subcategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allProduct')->with('message', 'Product Added Successfully');

    }
}