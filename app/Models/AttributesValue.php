<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributesValue extends Model
{
    use HasFactory;


    protected $table = 'attributes_value';

    protected $fillable = [
        'name',
        'attributes_id',
        'icon',
        'slug',
        'desc',
        'status',
        'color_code',
        
    ];

    public static  function get_attr($id){
        return AttributesValue::all()->where('attributes_id',$id);
    }
}
