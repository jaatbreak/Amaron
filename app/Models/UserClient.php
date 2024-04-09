<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClient extends Model
{
    use HasFactory;
    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'address',
        'password',
        'phone',
        'status',
        'avatar',
        'city',
        'country',
        'state',
        'pin_code',
        'bio',
    ];

 /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



}
