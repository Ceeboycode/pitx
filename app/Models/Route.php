<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'name',
        'vehicle_type_id',
        'is_active',
        'created_by',
        'updated_by'
    ];

    //no relationships yet
}
