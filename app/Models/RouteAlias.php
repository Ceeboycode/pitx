<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteAlias extends Model
{
    protected $fillable = [
        'route_id',
        'alias',
        'created_by',
        'updated_by'
    ];

    //no relationships yet
}
