<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerWithdrawal extends Model
{
    use HasFactory;

    // Nama tabel yang dipakai
    protected $table = 'seller_withdrawals';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'seller_id',
        'amount',
        'bank_account_name',
        'bank_account_number',
        'bank_name',
        'status',
    ];

    // Relasi ke user (seller)
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}