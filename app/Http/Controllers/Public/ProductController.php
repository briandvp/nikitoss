<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('is_active', true)
            ->with('category')
            ->orderBy('name')
            ->get();

        // Group products by category mapping for easier display if needed, 
        // or just pass them as is. The view can handle filtering/grouping.

        return view('public.products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        if (!$product->is_active) {
            abort(404);
        }
        return view('public.products.show', compact('product'));
    }
}
