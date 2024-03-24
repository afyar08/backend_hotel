<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaundryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan ID reservasi
        $reservasiId = DB::table('reservasi')->where('tgl_check_in', '2023-04-01')->value('id');

        // Menambahkan layanan laundry untuk reservasi dengan ID tertentu
        DB::table('layanan_laundry')->insert([
            'id_reservasi' => $reservasiId,
            'deskripsi' => '10 potong',

        ]);

        // Anda bisa menambahkan lebih banyak layanan laundry dengan cara yang sama
    }
}
