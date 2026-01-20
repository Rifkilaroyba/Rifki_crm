<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Sales',
            'email' => 'sales@test.com',
            'password' => Hash::make('sales'),
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@test.com',
            'password' => Hash::make('manager'),
        ]);
    }
}
