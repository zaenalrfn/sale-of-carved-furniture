<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'short_description',
        'price',
        'discount_price',
    ];

    // Relasi ke tabel gambar produk
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Relasi ke tabel tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relasi ke tabel kategori produk
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
