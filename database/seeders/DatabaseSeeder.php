<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Uncomment to generate 10 random users
        // User::factory(10)->create();

        // Call the UserSeeder to create the admin user
        $this->call(UserSeeder::class);

        // Create a specific test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Hash the test user's password
            'role' => 'user', // Default user role
        ]);
    }
}
