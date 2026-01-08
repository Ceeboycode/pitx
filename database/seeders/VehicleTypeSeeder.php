<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (! $user) {
            $this->command->error('No users found. Please seed users first.');
            return;
        }

        $types = [
            'Provincial Bus',
            'City Bus',
            'UV Express',
            'Jeepney',
            'Taxi',
            'Motorcycle Taxi',
            'Service Van',
            'Delivery Truck',
        ];

        foreach ($types as $type) {
            VehicleType::create([
                'name' => $type,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);
        }
    }
}
