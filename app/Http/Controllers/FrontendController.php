<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $product = Product::latest()->take(8)->get();
        return view('index', compact('product'));
    }

    public function About()
    {
        return view('about');
    }

    public function product()
    {
        $product = Product::latest()->get();
        return view('product', compact('product'));
    }

    public function singleProduct(Product $product){
        return view('single_product', compact('product'));
    }

    public function cart()
    {
        return view('cart');
    }
}
