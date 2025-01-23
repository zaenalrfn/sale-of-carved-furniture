<?php

namespace App\Http\Controllers\ProductsLanding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class addToCartController extends Controller
{
    // Tambahkan produk ke cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        // Simpan ke database
        $cartItem = Cart::updateOrCreate(
            ['product_id' => $productId],
            ['quantity' => DB::raw("quantity + $quantity")]
        );

        return response()->json(['message' => 'Product added to cart', 'cartItem' => $cartItem]);
    }

    // Ambil semua item dari cart
    public function getCartItems()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        return response()->json($cartItems);
    }
}
