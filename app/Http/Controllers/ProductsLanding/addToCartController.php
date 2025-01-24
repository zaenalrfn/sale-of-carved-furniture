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
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return response()->json(['message' => 'anda tidak memiliki akses untuk add to cart, silahkan login dulu'], 403);
        }
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        // Simpan ke database
        $cartItem = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $productId],
            ['quantity' => DB::raw("quantity + $quantity")]
        );

        return response()->json(['message' => 'produk berhasil ditambahkan ke keranjang', 'cartItem' => $cartItem]);
    }

    // Ambil semua item dari cart
    public function getCartItems()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        return response()->json($cartItems);
    }

    // bagian destory item cart
    public function destroyCartItems(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return response()->json(['message' => 'anda tidak memiliki akses untuk menghapus item dari keranjang, silahkan login dulu'], 403);
        }

        $request->validate([
            'cart_item_id' => 'required|exists:carts,id',
        ]);

        $cartItemId = $request->input('cart_item_id');

        $cartItem = Cart::where('id', $cartItemId)
            ->where('user_id', Auth::id())
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Item berhasil dihapus dari keranjang']);
        } else {
            return response()->json(['message' => 'Item tidak ditemukan atau tidak dapat dihapus'], 404);
        }
    }
}
