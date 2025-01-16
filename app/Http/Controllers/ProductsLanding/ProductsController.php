<?php

namespace App\Http\Controllers\ProductsLanding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('landing.welcome', compact('products'));
    }
}
