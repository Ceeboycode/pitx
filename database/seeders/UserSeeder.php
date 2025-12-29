<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Cedric Heyrosa',
        //     'email' => 'cee@gmail.com',
        //     'password' => '123',
        //     'role_id' => 1
        // ]);

        User::create([
            'f_name' => 'Arsha',
            'm_name' => null,
            'l_name' => 'Tabree',
            'suffix' => null,
            'email' => 'arsha.tabree@gmail.com',
            'phone' => '09876543210',
            'password' => '123',
            'role_id' => 1
        ]);
    }
}
