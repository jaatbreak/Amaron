<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'username',
        'email',
        'mobile',
        'phone',
        'order_items',
        'c_id',
        'order_notes',
        'address',
        'payment_mode',
        'coupon_code',
        'data',
        'grand_total',
        'vendor_id',
        'user_id',
        'payment_status',
        'pin_code',
        'city',
        'rand',
        'order_total',
        'wallet_used',
    ];
}
