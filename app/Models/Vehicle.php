<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    // Vehicle Type relationship
    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }
}
