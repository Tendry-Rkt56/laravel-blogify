<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin 01',
            'password' => Hash::make('admin01'),
            'email' => 'admin01@gmail.com',
            'role' => 'admin',
            'adresse' => 'Dans le monde',
        ]);
        User::factory(10)->hasPosts(random_int(2,5))->create();
        Comment::factory()->count(100)->create();
    }
}
