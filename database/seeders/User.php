<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dinas Example',
            'email' => 'dinas@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'), // Use a default password
            'image' => null, // Optional, can be filled with an image path if needed
            'profession' => 'Dinas Example Profession',
            'region' => 'DKI Jakarta', // Optional, change based on your requirements
            'address' => 'Jl. Example No. 123',
            'contact' => '08123456789',
            'role' => 'Dinas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
