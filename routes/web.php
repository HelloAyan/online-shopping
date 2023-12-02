<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard/admin/test', [DashboardController::class, 'test']
)->middleware(['auth', 'verified'])->name('test');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::controller(DashboardController::class)->group(function (){
        Route::get('admin/dashboard', 'index')->name('admindashboard');
    }); 

    Route::controller(CategoryController::class)->group(function (){
        Route::get('admin/all-category', 'index')->name('allCategory');
        Route::get('admin/add-category', 'AddCategory')->name('addCategory');
        Route::post('admin/store-category', 'storeCategory')->name('storeCategory');
        Route::get('admin/edit-category/{id}', 'editCategory')->name('editCategory');
        Route::get('admin/update-category', 'updateCategory')->name('updateCategory');
    });
    
    Route::controller(SubCategoryController::class)->group(function (){
        Route::get('admin/all-subcategory', 'index')->name('allSubCategory');
        Route::get('admin/add-subcategory', 'AddSubCategory')->name('addSubCategory');
    });

    Route::controller(ProductController::class)->group(function (){
        Route::get('admin/all-product', 'index')->name('allProduct');
        Route::get('admin/add-product', 'AddProduct')->name('addProduct');
    });

    Route::controller(OrderController::class)->group(function (){
        Route::get('admin/pending-order', 'index')->name('pendingOrder');
        
    });
});





require __DIR__.'/auth.php';