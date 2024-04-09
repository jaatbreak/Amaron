<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    
    protected $table = 'coupon';

    protected $fillable = [
        'featured',
        'coupon_code',
        'type',
        'min_value',
        'min_value',
        'status',
        'start_date',
        'end_date',
        'message',
        'image',
        'desc',
        'status',
    ];
}