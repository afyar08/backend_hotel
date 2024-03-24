<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipe_kamar')->insert([
            'bed_tipe' => 'Single',
            'nama_tipe' => 'Standard',
            'kapasitas_ruangan' => 2,
            'deskripsi' => 'Kamar standar dengan satu tempat tidur.',
        ]);

        DB::table('tipe_kamar')->insert([
            'bed_tipe' => 'Double',
            'nama_tipe' => 'Deluxe',
            'kapasitas_ruangan' => 4,
            'deskripsi' => 'Kamar deluxe dengan dua tempat tidur.',
        ]);

        DB::table('tipe_kamar')->insert([
            'bed_tipe' => 'Queen',
            'nama_tipe' => 'Suite',
            'kapasitas_ruangan' => 6,
            'deskripsi' => 'Kamar suite dengan satu tempat tidur besar.',
        ]);

    }
}
