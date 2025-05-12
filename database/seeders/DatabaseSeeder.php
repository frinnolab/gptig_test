<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        // \App\Models\Product::factory(10)->create();
        // \App\Models\UserRating::factory(10)->create(); // generate 10 ratings

        $this->call(UserProfileSeeder::class);
    }
}
