<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
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


Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'Index')->name('Home');
});

Route::controller(ClientController::class)->group(function(){
    Route::get('/category', 'category')->name('category');
    Route::get('/single-product', 'singleProduct')->name('singleProduct');
    Route::get('/add-to-cart', 'addToCart')->name('addToCart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/user-profile', 'userProfile')->name('userProfile');
    Route::get('/new-release', 'newRelease')->name('newRelease');
    Route::get('/todays-deal', 'todaysDeal')->name('todaysDeal');
    Route::get('/customer-service', 'customerService')->name('customerService');
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
        Route::post('admin/update-category', 'updateCategory')->name('updateCategory');
        Route::get('admin/delete-category/{id}', 'deleteCategory')->name('deleteCategory');
    });
    
    Route::controller(SubCategoryController::class)->group(function (){
        Route::get('admin/all-subcategory', 'index')->name('allSubCategory');
        Route::get('admin/add-subcategory', 'AddSubCategory')->name('addSubCategory');
        Route::post('admin/store-subcategory', 'storeSubCategory')->name('storeSubCategory');
        Route::get('admin/edit-subcategory/{id}', 'editSubCategory')->name('editSubCategory');
        Route::put('admin/update-subcategory/', 'updateSubCategory')->name('updateSubCategory');
        Route::delete('admin/delete-subcategory/{id}', 'deleteSubCategory')->name('deleteSubCategory');
    });

    Route::controller(ProductController::class)->group(function (){
        Route::get('admin/all-product', 'index')->name('allProduct');
        Route::get('admin/add-product', 'AddProduct')->name('addProduct');
        Route::post('admin/store-product', 'storeProduct')->name('storeProduct');
        Route::get('admin/edit-product/{id}', 'editProduct')->name('editProduct');
        Route::put('admin/update-product', 'updateProduct')->name('updateProduct');
        Route::delete('admin/delete-product/{id}', 'deleteProduct')->name('deleteProduct');
    });

    Route::controller(OrderController::class)->group(function (){
        Route::get('admin/pending-order', 'index')->name('pendingOrder');
        
    });
});





require __DIR__.'/auth.php';