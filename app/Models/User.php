<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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

    protected function role(): Attribute
    {
        $rolename = [];
        $roles = role::all();
        foreach ($roles as $role) {
            array_push($rolename, $role->name);

        }
        //  $rolename = ["user","employee","admin"];

        return new Attribute(
            get: fn ($value) => $rolename[$value - 1],
        );
    }

    public function employee()
    {
        return $this->hasOne('App\Models\employee', 'user_id', 'id');
    }

    public function shopcartitem()
    {
        return $this->hasMany('App\Models\shopcartitem');
    }

    public function order()
    {
        return $this->hasMany('App\Models\order');
    }

    public function castomer()
    {
        return $this->hasOne('App\Models\castomer');
    }
}
