<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleType extends Model
{
    protected $fillable = [
        'name',
        'created_by',
        'updated_by'
    ];

    //wala pa yung relationship niya sa ibang tables

    // User who CREATED the vehicle type
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // User who UPDATED the vehicle type
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
