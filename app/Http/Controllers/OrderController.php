<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('dashboard');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        // Validation and logic to come
        return redirect()->route('dashboard')->with('success', 'Pedido enviado correctamente');
    }

    public function index()
    {
        return view('dashboard.history');
    }
}
