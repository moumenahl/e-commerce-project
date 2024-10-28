<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // إنشاء حساب Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'role' => User::ROLE_ADMIN,
        ]);

        // إنشاء حساب Customer
        // User::create([
        //     'name' => 'Customer User',
        //     'email' => 'customer@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => User::ROLE_CUSTOMER,
        // ]);
    }
}
