<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function recipes()
    {
        $recipes = [
            [
                'name' => 'Nachos de tacos en sartén',
                'image' => 'img/recipes/6814fae8a7194.png',
                'description' => 'Una deliciosa receta de nachos preparados en sartén.',
                'ingredients' => ['Nachos', 'Queso', 'Carne molida', 'Jalapeños'],
                'url' => '#'
            ],
            [
                'name' => 'Barritas mágicas con papas fritas corte clásico',
                'image' => 'img/recipes/6814fbf71298e.png',
                'description' => 'Un snack dulce y salado perfecto para compartir.',
                'ingredients' => ['Papas fritas', 'Chocolate', 'Mantequilla de maní', 'Azúcar'],
                'url' => '#'
            ],
            [
                'name' => 'Sándwich de pollo empanizado con papas fritas',
                'image' => 'img/recipes/6852b20b863c3.png',
                'description' => 'El clásico sándwich de pollo acompañado de nuestras papas fritas.',
                'ingredients' => ['Pollo', 'Pan rallado', 'Papas fritas', 'Lechuga', 'Tomate'],
                'url' => '#'
            ]
        ];

        return view('public.recipes', compact('recipes'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function whereToBuy()
    {
        return view('public.where-to-buy');
    }
}
