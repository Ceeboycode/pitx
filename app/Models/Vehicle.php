<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'plate_num',
        'vehicle_type_id',
        'capacity',
        'is_active',
        'in_terminal',
        'created_by',
        'updated_by'
    ];

    //di pa included dito relationship sa ibang tables
}
