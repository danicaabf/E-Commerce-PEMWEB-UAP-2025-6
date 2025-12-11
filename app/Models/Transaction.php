<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'code',
        'buyer_id',
        'store_id',
        'address',
        'address_id',
        'city',
        'postal_code',
        'shipping',
        'shipping_type',
        'shipping_cost',
        'tracking_number',
        'tax',
        'grand_total',
        'payment_status',
    ];

    protected $casts = [
        'shipping_cost' => 'decimal:2',
        'tax' => 'decimal:2',
        'grand_total' => 'decimal:2',
    ];

    // BUYER
    public function buyer()
    {
        return $this->belongsTo(\App\Models\User::class, 'buyer_id');
    }

    // STORE
    public function store()
    {
        return $this->belongsTo(\App\Models\Store::class, 'store_id');
    }

    // DETAIL TRANSAKSI
    public function transactionDetails()
    {
        return $this->hasMany(\App\Models\TransactionDetail::class);
    }

    // REVIEW PRODUK
    public function productReviews()
    {
        return $this->hasMany(\App\Models\ProductReview::class);
    }
}
