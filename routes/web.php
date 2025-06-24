<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;

// Otentikasi
Auth::routes();

// Route untuk tamu/member
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/product/{product}', [FrontendController::class, 'singleProduct']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/cart', [FrontendController::class, 'cart']);

// Dashboard untuk user login biasa
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route untuk Admin (dengan middleware auth dan Admin)
Route::group(['prefix' => 'admin', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
});
