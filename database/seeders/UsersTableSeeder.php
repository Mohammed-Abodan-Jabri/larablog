<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create a user with specific attributes
        User::create([
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
        ]);

        // Create additional users as needed
        // ...
    }
}
