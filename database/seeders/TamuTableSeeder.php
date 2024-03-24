<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tamu')->insert([
            'nama' => 'John Doe',
            'email' => 'john.tamu@example.com',
            'password' => bcrypt('password'),
            'no_telp' => '1234567890',
        ]);

        DB::table('tamu')->insert([
            'nama' => 'Jane Doe',
            'email' => 'jane.tamu@example.com',
            'password' => bcrypt('password'),
            'no_telp' => '0987654321',
        ]);

        DB::table('tamu')->insert([
            'nama' => 'Resepsionis',
            'email' => 'resepsionis.tamu@example.com',
            'password' => bcrypt('password'),
            'no_telp' => '1122334455',
        ]);
    }
}
