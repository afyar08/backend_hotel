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
        $reservasiData = [];

        for ($i = 1; $i <= 10; $i++) {
            $reservasiData[] = [
                'tgl_check_in' => now()->addDays($i),
                'tgl_check_out' => now()->addDays($i + 1),
                'id_tamu' => rand(1, 2),
                'detail_tamu' => 'Detail tamu ' . $i,
                'pembayaran' => 'Cash',
                'total_bayar' => rand(300000, 700000),
                'status_pembayaran' => 'Lunas',
                'id_kamar' => rand(1, 30),
                'id_resepsionis' => 1,
                'room_plan' => '-', // Memberikan nilai default berupa string kosong
                'request' => '-', // Memberikan nilai default berupa string kosong
                'reservation_by' => '-', // Memberikan nilai default berupa string kosong
                'duration' => 0, // Memberikan nilai default berupa angka 0
                'room_total' => 0, // Memberikan nilai default berupa angka 0
                'adult' => 0, // Memberikan nilai default berupa angka 0
                'children' => 0, // Memberikan nilai default berupa angka 0
                'extra' => 0,
                'sub_total' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('reservasi')->insert($reservasiData);
    }
}
