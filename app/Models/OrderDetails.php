<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Relasi ke order (order yang dimiliki order detail ini)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi ke product (produk yang dipesan)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
