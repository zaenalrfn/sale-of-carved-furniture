<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'isAdmin', 'verified'])->name('dashboard');

Route::middleware(['auth', 'isAdmin'])->group(function () {
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
