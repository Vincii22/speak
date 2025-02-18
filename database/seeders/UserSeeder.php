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
            'name' => 'Ivan Jacob Milan',
            'email' => 'ivanjacobmilan@gmail.com',
            'password' => Hash::make('ivanjacob'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
            'role' => 'admin',
        ]);

        // // Create 2 users with 'professional' role
        // User::create([
        //     'name' => 'Arvin Milan',
        //     'email' => 'vinmilan0922@gmail.com',
        //     'password' => Hash::make('redblood12'),
        //     'role' => 'professional',
        // ]);

        // User::create([
        //     'name' => 'Professional 2',
        //     'email' => 'professional1@gmail.com',
        //     'password' => Hash::make('passpass'),
        //     'role' => 'professional',
        // ]);

        // // Create 2 users with 'admin' role
        // User::create([
        //     'name' => 'Admin 1',
        //     'email' => 'admin1@gmail.com',
        //     'password' => Hash::make('passpass'),
        //     'role' => 'admin',
        // ]);

        // User::create([
        //     'name' => 'Admin 2',
        //     'email' => 'admin2@gmail.com',
        //     'password' => Hash::make('passpass'),
        //     'role' => 'admin',
        // ]);
    }
}
