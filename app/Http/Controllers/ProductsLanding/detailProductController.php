<?php

namespace App\Http\Controllers\ProductsLanding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class detailProductController extends Controller
{
    public function show($id)
    {
        // Ambil produk dengan relasi
        $detailProduct = Product::with(['category', 'tags', 'images'])->findOrFail($id);
        return view('landing.detailProduct', compact('detailProduct'));
    }
}
