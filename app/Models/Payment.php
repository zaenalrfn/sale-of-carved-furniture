<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
