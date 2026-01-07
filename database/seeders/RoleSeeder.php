<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // based on preliminary ERD
        Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Role::create([
            'name' => 'Dispatcher',
            'slug' => 'dispatcher',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Role::create([
            'name' => 'Cashier',
            'slug' => 'cashier',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        // Role::insert([
        //     ['name' => 'Admin', 'slug' => 'admin'],
        //     ['name' => 'Dispatcher', 'slug' => 'dispatcher'],
        // ]);
    }
}
