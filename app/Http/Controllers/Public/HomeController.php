<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = \App\Models\Banner::where('active', true)->get();
        $categories = \App\Models\Category::all(); // Or whereHas('products')
        $products = \App\Models\Product::where('is_active', true)->with('category')->latest()->take(12)->get();

        return view('public.home', compact('banners', 'categories', 'products'));
    }
}
