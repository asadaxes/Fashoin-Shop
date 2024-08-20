<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/category/{category}', [ProductController::class, 'category'])->name('category_view');
Route::get('/product/{product}', [ProductController::class, 'product_view'])->name('product_view');
Route::get('/my-cart', [ProductController::class, 'cart'])->name('cart');