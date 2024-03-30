<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Mendapatkan ID tamu
        // $tamuId = DB::table('tamu')->where('email', 'john.tamu@example.com')->value('id');

        // // Mendapatkan ID kamar
        // $kamarId = DB::table('kamar')->where('no_kamar', '101')->value('id');

        // $resepsionisId = DB::table('users')->where('role', 'resepsionis')->value('id');

        // // Menambahkan reservasi untuk tamu dengan ID tertentu dan kamar dengan ID tertentu
        // DB::table('reservasi')->insert([
        //     'id_tamu' => $tamuId,
        //     'id_kamar' => $kamarId,
        //     'id_resepsionis' => $resepsionisId,
        //     'tgl_check_in' => '2023-04-01',
        //     'tgl_check_out' => '2023-04-05',
        //     'total_bayar' => 100000,
        //     'detail_tamu' => '2 orang dewasa, 1 anak kecil',
        // ]);
    }
}
