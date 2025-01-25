<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {

        $carts = Cart::with(['user', 'product']) // Load relasi user dan product
            ->where('user_id', Auth::id())
            ->get();
        return view('user.checkout', compact('carts'));
    }
}
