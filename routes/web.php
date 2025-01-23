<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\ProductsLanding\ProductsController;
use App\Http\Controllers\ProductsLanding\detailProductController;
use App\Http\Controllers\ProductsLanding\addToCartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index'])->name('landing');

// user
Route::get('/myaccount', function () {
    return view('user.myaccount');
});
Route::get('/orders', function () {
    return view('user.orders');
});
Route::get('/detail_products/{id}', [detailProductController::class, 'show'])->name('detail_products');


// admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // route dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // route products
    Route::resource('products', ProductController::class);
    Route::delete('products', [ProductController::class, 'destroyAll'])->name('products.destroyAll');
    // route category
    Route::resource('category', CategoryController::class);
    Route::delete('category', [CategoryController::class, 'destroyAll'])->name('category.destroyAll');
    // route profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
