<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $fillable = [
        'name',
        'created_by',
        'updated_by'
    ];

    //wala pa yung relationship niya sa ibang tables
}
