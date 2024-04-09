<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'slug',
        'product_desc',
        'product_specification',
        'product_sort_desc',
        'product_category',
        'is_featured',
        'is_popular',
        'product_image',
        'product_gallery',
        'product_regular_price',
        'product_sale_price',
        'product_regular_price_doller',
        'product_sale_price_doller',
        'stock_quantity',
        'stock_status',
        'hsn',
        'publish',
        'allow_return',
        'allow_cod',
        'on_sale',
        'allow_reviews',
        'weight',
        'height',
        'width',
        'length',
        'sgst',
        'cgst',
        'igst',
        'purchase_note',
        'status',
    ];
}
