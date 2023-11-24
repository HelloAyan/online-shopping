<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return 'hello world';
    }

    public function index2(){
        return 'hello world 2';
    }

    public function test(){
        return ' hello test dashboard';
    }
}