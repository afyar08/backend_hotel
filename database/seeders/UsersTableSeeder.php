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
            'email' => 'johndul@gmail.com',
            'no_telp' => '1234567890',
            'kategori' => 'ON',
            'password' => Hash::make('password'),
            'confirmation_code' => 'ABC123', // Sesuaikan dengan kolom yang ada di database
            'confirmed_at' => now(),
        ]);

        DB::table('guests')->insert([
            'nama' => 'Jane Smith',
            'email' => 'jane@gmail.com',
            'no_telp' => '987654321',
            'kategori' => 'BP',
            'password' => Hash::make('password'),
            'confirmation_code' => 'DEF456', // Sesuaikan dengan kolom yang ada di database
            'confirmed_at' => now(),
        ]);

        DB::table('guests')->insert([
            'nama' => 'Michael Johnson',
            'email' => 'michael@gmail.com',
            'no_telp' => '5551234567',
            'kategori' => 'BP',
            'password' => Hash::make('michael123'),
            'confirmation_code' => 'GHI789',
            'confirmed_at' => now(),
        ]);

        DB::table('guests')->insert([
            'nama' => 'Emily Anderson',
            'email' => 'emily@gmail.com',
            'no_telp' => '5559876543',
            'kategori' => 'ON',
            'password' => Hash::make('emily456'),
            'confirmation_code' => 'JKL012',
            'confirmed_at' => now(),
        ]);


        DB::table('guests')->insert([
            'nama' => 'David Brown',
            'email' => 'david@gmail.com',
            'no_telp' => '5555555555',
            'kategori' => 'ON',
            'password' => Hash::make('david789'),
            'confirmation_code' => 'MNO345',
            'confirmed_at' => now(),
        ]);

        DB::table('guests')->insert([
            'nama' => 'Linda Santika',
            'email' => 'linda@gmail.com',
            'no_telp' => '083896783162',
            'kategori' => 'BP',
            'password' => Hash::make('12345678'),
            'confirmation_code' => 'PQR678',
            'confirmed_at' => now(),
        ]);



        // Seeder untuk tabel receptionists
        DB::table('receptionists')->insert([
            'username' => 'rct1',
            'password' => Hash::make('password'),
        ]);

        DB::table('receptionists')->insert([
            'username' => 'linda',
            'password' => Hash::make('12345678'),
        ]);
    }
}
