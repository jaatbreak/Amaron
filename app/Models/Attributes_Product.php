<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes_Product extends Model
{
    use HasFactory;

    protected $table = 'attributes_products';

    protected $fillable = [
        'slug',
        'product_name',
        'product_regular_price',
        'product_sale_price',
        'product_regular_price_doller',
        'product_sale_price_doller',
        'product_image',
        'product_id',
        'created_at',
        'updated_at',
    ];


}
