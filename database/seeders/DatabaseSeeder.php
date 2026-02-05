<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@nikitos.com',
            'password' => bcrypt('password'),
        ]);

        // Categories
        $burgers = \App\Models\Category::create(['name' => 'Burgers', 'slug' => 'burgers']);
        $pizzas = \App\Models\Category::create(['name' => 'Pizzas', 'slug' => 'pizzas']);

        // Products
        \App\Models\Product::create([
            'name' => 'Classic Burger',
            'slug' => 'classic-burger',
            'description' => 'Juicy beef patty with cheese and lettuce.',
            'price' => 12.99,
            'category_id' => $burgers->id,
            'image_path' => '', // Placeholder or null
            'is_active' => true,
        ]);

        \App\Models\Product::create([
            'name' => 'Pepperoni Pizza',
            'slug' => 'pepperoni-pizza',
            'description' => 'Classic pepperoni with mozzarella.',
            'price' => 15.99,
            'category_id' => $pizzas->id,
            'image_path' => '',
            'is_active' => true,
        ]);

        // Banner
        \App\Models\Banner::create([
            'title' => 'Welcome to Nikitos',
            'description' => 'Best Food in Town',
            'image_path' => '',
            'button_text' => 'Order Now',
            'button_link' => '#products',
            'active' => true,
        ]);
    }
}
