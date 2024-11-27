<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seeder untuk user dengan role Dinas
        DB::table('users')->insert([
            'name' => 'Dinas Example',
            'email' => 'dinas@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Gunakan Hash::make untuk keamanan
            'image' => null, // Optional, bisa diisi dengan path gambar
            'profession' => 'Dinas Example Profession',
            'region' => 'DKI Jakarta', // Optional, bisa diubah sesuai kebutuhan
            'address' => 'Jl. Example No. 123',
            'contact' => '08123456789',
            'role' => 'Dinas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Daftar provinsi di Indonesia
        $indonesiaProvinces = [
            'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Jambi',
            'Sumatera Selatan', 'Bengkulu', 'Lampung', 'Kepulauan Bangka Belitung',
            'Kepulauan Riau', 'DKI Jakarta', 'Jawa Barat', 'Jawa Tengah',
            'DI Yogyakarta', 'Jawa Timur', 'Banten', 'Bali', 'Nusa Tenggara Barat',
            'Nusa Tenggara Timur', 'Kalimantan Barat', 'Kalimantan Tengah',
            'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara',
            'Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan',
            'Sulawesi Tenggara', 'Gorontalo', 'Sulawesi Barat', 'Maluku',
            'Maluku Utara', 'Papua', 'Papua Barat', 'Papua Selatan',
            'Papua Tengah', 'Papua Pegunungan',
        ];

        // Gunakan faker untuk membuat 5 user dengan role Petani
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Gunakan password default
                'image' => null, // Optional, bisa diganti dengan path gambar
                'profession' => 'Petani',
                'region' => $indonesiaProvinces[array_rand($indonesiaProvinces)], // Pilih acak dari daftar provinsi
                'address' => $faker->address,
                'contact' => $faker->phoneNumber,
                'role' => 'Petani',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
