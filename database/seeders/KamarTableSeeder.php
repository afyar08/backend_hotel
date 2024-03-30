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

        // // Menambahkan kamar dengan tipe Standard
        // DB::table('kamar')->insert([
        //     'no_kamar' => '101',
        //     'status_ketersediaan' => 'ready',
        //     'harga' => 100000,
        //     'tipe_kamar_id' => $standardTipeKamarId,
        // ]);

        
    }
}
