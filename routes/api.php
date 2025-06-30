<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//auth route
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// wajib Login
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('product', [ProductController::class, 'index']);
    Route::get('product/{id}', [ProductController::class, 'show']);

    Route::get('category', [CategoryController::class, 'index']);
    Route::post('category', [CategoryController::class, 'addCategory']);
});




// Route::get('/hello', function () {
//     return response()->json([
//         'message' => 'Daffa Ramadhan Maulana'
//     ]);
// });

// Route::get('/sayHello/{nama}', function ($nama) {
//     return response()->json([
//         'message' => "Hi $nama !"
//     ]);
// });


