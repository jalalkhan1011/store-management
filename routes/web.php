<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Middleware\TenatMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::domain('{subdomain}.localhost')->group(function(){
    Route::get('/',[FrontendController::class, 'shopDetails']);
});

Route::post('/custom-login', [LoginController::class, 'customLogin'])->name('customLogin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('/merchant/dashboard', [HomeController::class, 'merchantDashboard'])->name('merchantDashboard')->middleware(TenatMiddleware::class);
    Route::get('/merchant/store-list', [StoreController::class, 'index'])->name('storeList')->middleware(TenatMiddleware::class);
    Route::get('/merchant/create-store', [StoreController::class, 'create'])->name('createStore');
    Route::resource('/stors', StoreController::class);
    Route::get('/merchant/category-list', [CategoryController::class, 'index'])->name('categoryList')->middleware(TenatMiddleware::class);
    Route::get('/merchant/create-category', [CategoryController::class, 'create'])->name('createCategory');
    Route::resource('/categories', CategoryController::class);
    Route::get('/merchant/product-list', [ProductController::class, 'index'])->name('productList')->middleware(TenatMiddleware::class);
    Route::get('/merchant/create-product', [ProductController::class, 'create'])->name('createProduct');
    Route::resource('/products', ProductController::class);
});
