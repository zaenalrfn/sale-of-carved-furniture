<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'short_description',
        'wood_type',
        'price',
        'thumb_image',
        'discount_price',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Relasi ke order details (setiap produk dapat ada dalam beberapa order)
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    // Relasi dengan Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);  // Product can have many Carts
    }
}
