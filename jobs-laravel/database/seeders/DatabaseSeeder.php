<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user1 = User::factory()->create([
            'name' => 'User 1',
            'email' => 'user1@test.com',
            'password' => bcrypt('testtest'),
        ]);

        $user2 = User::factory()->create([
            'name' => 'User 2',
            'email' => 'user2@test.com',
            'password' => bcrypt('testtest'),
        ]);

        Listing::factory(6)->create([
            'user_id' => $user1->id,
        ]);

        Listing::factory(6)->create([
            'user_id' => $user2->id,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
