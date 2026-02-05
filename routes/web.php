<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [\App\Http\Controllers\Public\HomeController::class, 'index'])->name('home');
Route::get('/productos', [\App\Http\Controllers\Public\ProductController::class, 'index'])->name('products.index');
Route::get('/recetas', [\App\Http\Controllers\Public\PageController::class, 'recipes'])->name('recipes');
Route::get('/nosotros', [\App\Http\Controllers\Public\PageController::class, 'about'])->name('about');
Route::get('/contacto', [\App\Http\Controllers\Public\PageController::class, 'contact'])->name('contact');
Route::get('/donde-comprar', [\App\Http\Controllers\Public\PageController::class, 'whereToBuy'])->name('where-to-buy');

Route::post('/contact', [\App\Http\Controllers\Public\ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\OrderController::class, 'create'])->name('dashboard');
    Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
    Route::get('/dashboard/history', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.history');
    Route::get('/dashboard/prices', [\App\Http\Controllers\PriceListController::class, 'index'])->name('prices.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::resource('messages', \App\Http\Controllers\Admin\MessageController::class)->only(['index', 'show', 'destroy']);
    });
});

require __DIR__ . '/auth.php';
