<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function category(){
        return view('home.category');
    }

    public function singleProduct(){
        return view('home.singleProduct');
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