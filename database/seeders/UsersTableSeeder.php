<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk tabel guests
        DB::table('guests')->insert([
            'nama' => 'John Doe',
            'email' => 'john@example.com',
            'no_telp' => '1234567890',
            'kategori' => 'ON',
            'password' => Hash::make('password'),
            'confirmation_code' => 'ABC123', // Sesuaikan dengan kolom yang ada di database
            'confirmed_at' => now(),
        ]);

        DB::table('guests')->insert([
            'nama' => 'Jane Smith',
            'email' => 'jane@example.com',
            'no_telp' => '987654321',
            'kategori' => 'BP',
            'password' => null,
            'confirmation_code' => 'DEF456', // Sesuaikan dengan kolom yang ada di database
            'confirmed_at' => now(),
        ]);

        // Seeder untuk tabel receptionists
        DB::table('receptionists')->insert([
            'username' => 'rct1',
            'password' => Hash::make('password'),
        ]);
    }
}
