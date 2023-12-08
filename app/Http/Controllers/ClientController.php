<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $cart_items = Cart::latest()->get();
        return view('home.addToCart', compact('cart_items'));
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

    public function pendingOrder(){
 return view('home.pendingOrder');
    }

    public function history(){
        return view('home.history');
    }

    public function addProductToCart(Request $request){
        $product_price = $request->price;
        $product_quantity = $request->quantity;
        $price = $product_price * $product_quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $price,
        ]);

        return redirect()->route('addToCart')->with('message', 'Your Item Added to Cart Successfully...');
    }
}