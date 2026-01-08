<?php

namespace Database\Seeders;

use App\Models\Role;
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

        $adminRole = Role::where('slug', 'admin')->first();
        // $adminRole = Role::where('slug', 'admin')->first();

        User::create([
            'f_name' => 'Arsha',
            'm_name' => null,
            'l_name' => 'Tabree',
            'suffix' => null,
            'email' => 'arsha.tabree@gmail.com',
            'phone' => '09876543211',
            'password' => bcrypt('123'),
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'f_name' => 'Dispatcher',
            'm_name' => null,
            'l_name' => '1',
            'suffix' => null,
            'email' => 'dispatcher@gmail.com',
            'phone' => '09876543212',
            'password' => bcrypt('123'),
            'role_id' => 2,
        ]);

        User::create([
            'f_name' => 'Cashier',
            'm_name' => null,
            'l_name' => '1',
            'suffix' => null,
            'email' => 'cashier@gmail.com',
            'phone' => '09876543213',
            'password' => bcrypt('123'),
            'role_id' => 3,
        ]);
    }
}
