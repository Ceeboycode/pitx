<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispatchLog extends Model
{
    protected $fillable = [
        'vehicle_id',
        'route_id',
        'pax_count',
        'gate_num',
        'bay_num',
        'time_in',
        'time_out',
        'remarks',
        'created_by',
        'updated_by'
    ];
}
