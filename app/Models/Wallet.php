<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallets';

    protected $fillable = [
        'user_id',
        'reference',
        'debit',
        'credit',
        'trans_type',
        'created_at',
    ];

    public function user()
    {
        return $this->belongTo(User::class,'user_id');
    }

}
