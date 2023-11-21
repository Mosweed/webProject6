<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopcartitems extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'drawer_id',
        'product_id',
        'quantity',
        'shopcartitem_price',
        'discount_percentage',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
