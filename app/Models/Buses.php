<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buses extends Model
{
    protected $fillable = [
        'plate_num',
        'body_num',
        'company_id'
    ];

    //no relationships yet
}
