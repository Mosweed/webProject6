<?php

namespace App\Models;

use Aap\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Aap\Models\product;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [

        'order_id',
        'product_id',
        'quantity',
        'price',
        'discount_percentage',
    ];

    // public function Product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id' , 'id');
    // }

    public function product()
    {
        return $this->hasOne('Aap\Models\Products', 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
