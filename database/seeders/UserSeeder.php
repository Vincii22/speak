<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 2 users with 'user' role
        User::create([
            'name' => 'User 1',
            'email' => 'user@gmail.com',
            'password' => Hash::make('passpass'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('passpass'),
            'role' => 'user',
        ]);

        // Create 2 users with 'professional' role
        User::create([
            'name' => 'Professional 1',
            'email' => 'professional@gmail.com',
            'password' => Hash::make('passpass'),
            'role' => 'professional',
        ]);

        User::create([
            'name' => 'Professional 2',
            'email' => 'professional1@gmail.com',
            'password' => Hash::make('passpass'),
            'role' => 'professional',
        ]);

        // Create 2 users with 'admin' role
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('passpass'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('passpass'),
            'role' => 'admin',
        ]);
    }
}
