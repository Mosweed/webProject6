<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'city',
        'zipcode',
        'housenumber',
        'phonenumber',
        'user_id',
        'employee_number',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getworkingtime()
    {
        return $this->hasMany(workingtime::class, 'employee_id', 'id');
    }
}
