<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function category($id){
        $categories = Category::findOrFail($id);
        $product = product::where('product_category_id', $id)->latest()->get();
        return view('home.category', compact('categories', 'product'));
    }

    public function productDetails($id){
        $product = product::findOrFail($id);
        $subcat_id = product::where('id', $id)->value('product_subcategory_id');
        $related_products = product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('home.singleProduct', compact('product', 'related_products'));
    }

    public function addToCart(){
        return view('home.addToCart');
    }

    public function checkout(){
        return view('home.checkout');
    }

    public function userProfile(){
        return view('home.userProfile');
    }

    public function newRelease(){
        return view('home.newRelease');
    }

    public function todaysDeal(){
        return view('home.todaysDeal');
    }

    public function customerService(){
        return view('home.customerService');
    }
}