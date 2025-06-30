<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::select('id', 'name', 'slug')
            ->first('created_at')
            ->get();

        $res = [
            'success' => 200,
            'message' => 'List Category',
            'data' => $categories,
        ];

        return response()->json($res, 200);
    }

    public function addCategory(Request $request) {
        $request->validate([
            'name' => 'required|string|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();

        $res = [
            'success' => true,
            'message' => 'new Category success added to database',
            'data' => $category,
        ];

        return response()->json($res, 201);
    }
}
