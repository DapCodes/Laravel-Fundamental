<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return ('ini halaman about');
});

Route::get('profile', function () {
    return view('profile');
});

Route::get('produk/{namaProduct}', function ($p) {
    return 'saya membeli ' . $p;
});

Route::get('kategori/{namaKategori}', function($kategori) {
    return view('kategori', compact('kategori'));
});

Route::get('search/{keyword?}', function($key = null) {
    return view('search', compact('key'));
});

// latihan
Route::get('promo/{barang?}/{kode?}', function($barang = null, $kode = null) {
    return view('promo', compact('barang', 'kode'));
});