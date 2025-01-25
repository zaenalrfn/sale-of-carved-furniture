<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showCheckout(Order $order)
    {
        return view('user.checkout', compact('order'));
    }
}
