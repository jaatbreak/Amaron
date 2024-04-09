<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posttype extends Model
{
    use HasFactory;

    protected $table = 'posttype';

    protected $fillable = [
        'title',
        'slug',
        'url',
        'page',
        'desc',
        'is_repeat',
        'bg_color',
        'image',
        'fields',
        'status',
    ];
}
