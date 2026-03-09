<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get();
        $title = "";
        return view("admin.product.index", ["products" => $product, "title" => $title]);
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->where('is_delete', false)->get();
        return view("admin.product.add", compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $product = new Product();
        $product->name        = $validated['name'];
        $product->price       = $validated['price'];
        $product->stock       = $validated['stock'];
        $product->category_id = $validated['category_id'] ?? null;

        if ($request->hasFile('image')) {
            $dest = public_path('uploads/products');
            if (!is_dir($dest)) {
                mkdir($dest, 0755, true);
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($dest, $filename);
            $product->image = 'uploads/products/' . $filename;
        }

        $product->save();

        return redirect()->route('index')->with('success', 'Product added successfully!');
    }

    public function getDetail(string $id = null)
    {
        if ($id) {
            $product = Product::with('category')->findOrFail($id);
            return view('admin.product.index', compact('product'));
        }
        return redirect()->route('index');
    }

    public function edit(string $id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::where('is_active', true)->where('is_delete', false)->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->stock       = $request->stock;
        $product->category_id = $request->category_id ?? null;

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $dest = public_path('uploads/products');
            if (!is_dir($dest)) {
                mkdir($dest, 0755, true);
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($dest, $filename);
            $product->image = 'uploads/products/' . $filename;
        }

        $product->save();

        return redirect()->route('index')->with('success', 'Product updated successfully!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('index')->with('success', 'Product deleted successfully!');
    }
}
