<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class castomer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'city',
        'zipcode',
        'phonenumber',
        'country',
        'user_id',
        'customer_number',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
