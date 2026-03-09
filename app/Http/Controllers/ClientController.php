<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ClientController extends Controller
{
    public function home()
    {
        $newProducts = Product::with('category')
            ->where('stock', '>', 0)
            ->latest()
            ->take(8)
            ->get();

        $topProducts = Product::with('category')
            ->where('stock', '>', 0)
            ->orderBy('id')
            ->take(8)
            ->get();

        $categories = Category::where('is_active', true)
            ->where('is_delete', false)
            ->whereNull('parent_id')
            ->take(3)
            ->get();

        return view('client.home', compact('newProducts', 'topProducts', 'categories'));
    }

    public function store(Request $request)
    {
        $query = Product::with('category')->where('stock', '>', 0);

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        $products   = $query->paginate(9);
        $categories = Category::where('is_active', true)->where('is_delete', false)->get();

        return view('client.store', compact('products', 'categories'));
    }

    public function product(int $id)
    {
        $product  = Product::with('category')->findOrFail($id);
        $related  = Product::with('category')
            ->where('id', '!=', $id)
            ->where('stock', '>', 0)
            ->when($product->category_id, fn($q) => $q->where('category_id', $product->category_id))
            ->take(4)
            ->get();

        return view('client.product', compact('product', 'related'));
    }

    public function checkout()
    {
        return view('client.checkout');
    }
}

