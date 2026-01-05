<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'created_by',
        'updated_by'
    ];

    //di pa included dito relationship sa ibang tables
}
