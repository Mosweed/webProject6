<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'categorie_id',
        'barcode',
        'stock',
        'image',
        'height_cm',
        'width_cm',
        'depth_cm',
        'weight_gr',
        'selling_price',
        'purchase_price',
        'discount_percentage',
        'kuin_id',
        'status',

    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'id');
    }

    public function shopcartItems()
    {
        return $this->hasMany(ShopcartItem::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id', 'id');
    }
}
