<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'title',
        'slug',
        'desc',
        'thumbnail',
        'banner_image',
        'status',
        'parent',
        'meta_title',
        'meta_content',
        'meta_keyword',
    ];

}
