<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'moataz',
            'email' => 'moataz@one.com',
            'phone_number' => '01234567890',
            'password' => bcrypt('password123'),
        ]);
        User::create([
            'name' => 'moataz',
            'email' => 'moataz@two.com',
            'phone_number' => '01234567891',
            'password' => bcrypt('password123'),
        ]);
        User::create([
            'name' => 'moataz',
            'email' => 'moataz@three.com',
            'phone_number' => '01234567892',
            'password' => bcrypt('password123'),
        ]);
    }
}
