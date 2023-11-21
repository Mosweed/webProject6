<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workingtime extends Model
{
    use HasFactory;

    protected $table = 'workingtimes';

    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'employee_id',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\employee');
    }
}
