<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcontent extends Model
{
    use HasFactory;
    protected $table = 'postcontent';
    protected $fillable = [
        'sort',
        'posttype_id',
        'field',
        'status',
    ];
}
