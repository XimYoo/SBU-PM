<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the users table first to prevent duplicate entries
        User::truncate();

        // Create an admin user
        User::create([
            'name' => 'William Yohanes Hutubessy',
            'email' => 'Williamhutubessy@gmail.com', // Admin email
            'password' => Hash::make('admin123'), // Securely hash the password
            'role' => 'admin', // Assign the admin role
        ]);
    }
}
