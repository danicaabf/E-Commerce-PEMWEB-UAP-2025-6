<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerBalance extends Model
{
    use HasFactory;

    protected $table = 'seller_balances'; 
    protected $fillable = ['user_id', 'amount'];

    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}