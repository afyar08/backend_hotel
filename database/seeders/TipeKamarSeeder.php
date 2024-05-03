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
        $tipeKamars = [
            [  
                'bed_tipe' => 'King Bed',
                'nama_tipe' => 'Standart Room', 
                'kapasitas_ruangan' => 2, 
                'deskripsi' => 'Deskripsi Standart Room'
            ],
            [
                'bed_tipe' => 'California King Bed', 
                'nama_tipe' => 'Superior Room', 
                'kapasitas_ruangan' => 2, 
                'deskripsi' => 'Deskripsi Superior Room'
            ],
            [
                'bed_tipe' => 'Queen Bed', 
                'nama_tipe' => 'Deluxe Room', 
                'kapasitas_ruangan' => 2, 
                'deskripsi' => 'Deskripsi Deluxe Room'
            ],
            [
                'bed_tipe' => 'Twin Bed', 
                'nama_tipe' => 'Twin Room', 
                'kapasitas_ruangan' => 2, 
                'deskripsi' => 'Deskripsi Twin Room'
            ],
            [
                'bed_tipe' => 'Single Bed', 
                'nama_tipe' => 'Single Room', 
                'kapasitas_ruangan' => 1, 
                'deskripsi' => 'Deskripsi Single Room'
            ],
            [
                'bed_tipe' => 'Double Bed', 
                'nama_tipe' => 'Double Room', 
                'kapasitas_ruangan' => 2, 
                'deskripsi' => 'Deskripsi Double Room'
            ],
            [
                'bed_tipe' => 'Double XL Bed', 
                'nama_tipe' => 'Family Room', 
                'kapasitas_ruangan' => 4, 
                'deskripsi' => 'Deskripsi Family Room'
            ],
            [
                'bed_tipe' => 'King Bed', 
                'nama_tipe' => 'Junior Suite Room', 
                'kapasitas_ruangan' => 4, 
                'deskripsi' => 'Deskripsi Junior Suite Room'
            ],
            [
                'bed_tipe' => 'King Bed',
                'nama_tipe' => 'Suite Room',
                'kapasitas_ruangan' => 4,
                'deskripsi' => 'Deskripsi Suite Room',
            ],
            [
                'bed_tipe' => 'King Bed',
                'nama_tipe' => 'Presidential Suite',
                'kapasitas_ruangan' => 6,
                'deskripsi' => 'Deskripsi Presidential Suite',
            ],
            [
                'bed_tipe' => 'Twin Bed',
                'nama_tipe' => 'Connecting Room',
                'kapasitas_ruangan' => 4,
                'deskripsi' => 'Deskripsi Connecting Room',
            ],
            [
                'bed_tipe' => 'Queen Bed',
                'nama_tipe' => 'Disabled Room',
                'kapasitas_ruangan' => 2,
                'deskripsi' => 'Deskripsi Disabled Room',
            ],
            [
                'bed_tipe' => 'King Bed',
                'nama_tipe' => 'Smoking Room',
                'kapasitas_ruangan' => 2,
                'deskripsi' => 'Deskripsi Smoking Room',
            ],

        ];

        DB::table('tipe_kamar')->insert($tipeKamars);


    }
}
