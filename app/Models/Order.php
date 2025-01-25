<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_status',
        'slug',
    ];

    // // Event untuk membuat slug
    // protected static function booted()
    // {
    //     static::creating(function ($order) {
    //         if (!$order->slug) {
    //             $order->slug = self::generateSlug();
    //         }
    //     });
    // }

    // // Fungsi untuk membuat slug unik
    // public static function generateSlug()
    // {
    //     return Str::random(10); // Slug berupa string acak
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
