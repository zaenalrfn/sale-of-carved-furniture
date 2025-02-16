<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsLanding\addToCartController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// bagian api cart
Route::middleware(['user'])->group(function () {
    Route::post('/cart/add', [addToCartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/items', [addToCartController::class, 'getCartItems'])->name('cart.items');
    Route::delete('/cart/destroy', [addToCartController::class, 'destroyCartItems'])->name('cart.destroy');
});
