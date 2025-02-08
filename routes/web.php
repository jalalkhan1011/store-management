<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Middleware\TenatMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/custom-login', [LoginController::class, 'customLogin'])->name('customLogin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'root_route'], function () {
        Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('adminDashboard');
        Route::get('/merchant/dashboard', [HomeController::class, 'merchantDashboard'])->name('merchantDashboard')->middleware(TenatMiddleware::class);
        Route::get('merchant/store-list', [StoreController::class, 'index'])->name('storeList')->middleware(TenatMiddleware::class);
        Route::get('merchant/create-store', [StoreController::class, 'create'])->name('createStore');
        Route::resource('/stors', StoreController::class);
    });
});
