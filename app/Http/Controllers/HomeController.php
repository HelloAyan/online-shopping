<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function Index(){
        $all_products = product::latest()->get();
        return view('home.home', compact('all_products'));
    }
}