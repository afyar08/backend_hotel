<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KamarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan ID tipe kamar untuk Standard
        $standardTipeKamarId = DB::table('tipe_kamar')->where('nama_tipe', 'Standard')->value('id');

        // Menambahkan kamar dengan tipe Standard
        DB::table('kamar')->insert([
            'no_kamar' => '101',
            'status_ketersediaan' => 'ready',
            'harga' => 100000,
            'tipe_kamar_id' => $standardTipeKamarId,
        ]);

        // Mendapatkan ID tipe kamar untuk Deluxe
        $deluxeTipeKamarId = DB::table('tipe_kamar')->where('nama_tipe', 'Deluxe')->value('id');

        // Menambahkan kamar dengan tipe Deluxe
        DB::table('kamar')->insert([
            'no_kamar' => '201',
            'status_ketersediaan' => 'occupied',
            'harga' => 150000,
            'tipe_kamar_id' => $deluxeTipeKamarId,
        ]);

        // Mendapatkan ID tipe kamar untuk Suite
        $suiteTipeKamarId = DB::table('tipe_kamar')->where('nama_tipe', 'Suite')->value('id');

        // Menambahkan kamar dengan tipe Suite
        DB::table('kamar')->insert([
            'no_kamar' => '301',
            'status_ketersediaan' => 'booking',
            'harga' => 200000,
            'tipe_kamar_id' => $suiteTipeKamarId,
        ]);
    }
}
