<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Tampilkan semua produk
    public function index()
    {
        $product = Product::latest()->get();

        $title = 'Hapus data!';
        $text = 'mau ngga di hapus data nya??';
        confirmDelete($title, $text);

        return view('backend.product.index', compact('product'));
    }

    public function create()
    {
        $category = Category::all();

        return view('backend.product.create', compact('category'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $randomName = Str::random(20).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('product', $randomName, 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('backend.product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Tampilkan detail produk
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('backend.product.show', compact('product'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();

        return view('backend.product.edit', compact('product', 'category'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $file = $request->file('image');
            $randomName = Str::random(20).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('product', $randomName, 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('backend.product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('backend.product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
