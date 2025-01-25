<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'account_name',
        'account_number',
        'bank_name',
        'payment_proof',
        'status',
        'slug',
    ];

    // // Event untuk membuat slug
    // protected static function booted()
    // {
    //     static::creating(function ($payment) {
    //         if (!$payment->slug) {
    //             $payment->slug = self::generateSlug();
    //         }
    //     });
    // }

    // // Fungsi untuk membuat slug unik
    // public static function generateSlug()
    // {
    //     return Str::uuid(); // Slug berupa UUID untuk keamanan
    // }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
