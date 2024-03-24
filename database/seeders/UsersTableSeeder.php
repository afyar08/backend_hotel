<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);


        DB::table('users')->insert([
            'name' => 'Resepsionis',
            'email' => 'resepsionis@example.com',
            'password' => bcrypt('password'),
            'role' => 'resepsionis',
        ]);
    }
}
