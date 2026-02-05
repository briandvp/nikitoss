<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function index()
    {
        return view('dashboard.prices');
    }
}
