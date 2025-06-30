<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index() {
        $product = Product::select(
            'products.id',
            'products.name',
            'products.slug',
            'products.description',
            'products.price',
            'products.stock',
            'products.image',
            'categories.name as kategori'
        )
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->latest('products.created_at')
        ->get();

        $res = [
            'success' => 200,
            'message' => 'List Product',
            'data' => $product,
        ];

        return response()->json($res, 200);
    }

    public function show($id){
        $product = Product::find($id);

        if(! $product) {
            $res = [
                'success' => false,
                'message' => 'Product not Found',
            ];

            return response()->json($res, 404);
        }

        $res = [
            'success' => true,
            'message' => 'Product Detail',
            'data' => $product,
        ];

        return response()->json($res, 200);
        
    }
}
