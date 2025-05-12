<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            User::create([
                // 'user_id' => $user->id,
                'name' => "Test user",
                'email' => "testuser@test.com",
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // default password
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
