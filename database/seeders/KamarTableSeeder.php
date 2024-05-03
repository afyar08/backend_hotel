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
        $kamars = [
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => 200000,
                'no_kamar' => '101',
                'tipe_kamar_id' => 1, // Sesuaikan dengan ID dari tipe kamar yang sesuai
            ],
            [
                'status_kamar' => 'dirty',
                'status_reservasi' => 'check out',
                'harga' => 250000,
                'no_kamar' => '102',
                'tipe_kamar_id' => 2, // Sesuaikan dengan ID dari tipe kamar yang sesuai
            ],
            [
                'status_kamar' => 'out of order',
                'status_reservasi' => 'out of order',
                'harga' => 0, // Harga 0 karena kamar tidak tersedia
                'no_kamar' => '103',
                'tipe_kamar_id' => 1, // Sesuaikan dengan ID dari tipe kamar yang sesuai
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(300000, 600000), // Harga antara Rp300.000 dan Rp600.000
                'no_kamar' => '104',
                'tipe_kamar_id' => 2, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '105',
                'tipe_kamar_id' => 3, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(300000, 600000), // Harga antara Rp300.000 dan Rp600.000
                'no_kamar' => '106',
                'tipe_kamar_id' => 2, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'cancelled',
                'harga' => rand(350000, 700000), // Harga antara Rp350.000 dan Rp700.000
                'no_kamar' => '107',
                'tipe_kamar_id' => 3, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'check in',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '108',
                'tipe_kamar_id' => 4, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '109',
                'tipe_kamar_id' => 5, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'out of order',
                'status_reservasi' => 'out of order',
                'harga' => 0, // Kamar "out of order" biasanya tidak dikenakan biaya
                'no_kamar' => '110',
                'tipe_kamar_id' => 6, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(500000, 1000000), // Harga antara Rp500.000 dan Rp1.000.000
                'no_kamar' => '111',
                'tipe_kamar_id' => 7, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(350000, 700000), // Harga antara Rp350.000 dan Rp700.000
                'no_kamar' => '112',
                'tipe_kamar_id' => 8, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'dirty',
                'status_reservasi' => 'check out',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '113',
                'tipe_kamar_id' => 9, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(450000, 900000), // Harga antara Rp450.000 dan Rp900.000
                'no_kamar' => '114',
                'tipe_kamar_id' => 10, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '115',
                'tipe_kamar_id' => 5, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(450000, 900000), // Harga antara Rp450.000 dan Rp900.000
                'no_kamar' => '116',
                'tipe_kamar_id' => 6, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'dirty',
                'status_reservasi' => 'reserved',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '117',
                'tipe_kamar_id' => 7, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'check out',
                'harga' => rand(500000, 1000000), // Harga antara Rp500.000 dan Rp1.000.000
                'no_kamar' => '118',
                'tipe_kamar_id' => 8, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'check out',
                'harga' => rand(350000, 700000), // Harga antara Rp350.000 dan Rp700.000
                'no_kamar' => '119',
                'tipe_kamar_id' => 9, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'check out',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '120',
                'tipe_kamar_id' => 10, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'dirty',
                'status_reservasi' => 'reserved',
                'harga' => rand(450000, 900000), // Harga antara Rp450.000 dan Rp900.000
                'no_kamar' => '121',
                'tipe_kamar_id' => 5, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'check out',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '122',
                'tipe_kamar_id' => 6, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'check out',
                'harga' => rand(500000, 1000000), // Harga antara Rp500.000 dan Rp1.000.000
                'no_kamar' => '123',
                'tipe_kamar_id' => 7, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'check out',
                'harga' => rand(350000, 700000), // Harga antara Rp350.000 dan Rp700.000
                'no_kamar' => '124',
                'tipe_kamar_id' => 8, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '125',
                'tipe_kamar_id' => 9, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'dirty',
                'status_reservasi' => 'reserved',
                'harga' => rand(450000, 900000), // Harga antara Rp450.000 dan Rp900.000
                'no_kamar' => '126',
                'tipe_kamar_id' => 10, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'check out',
                'harga' => rand(400000, 800000), // Harga antara Rp400.000 dan Rp800.000
                'no_kamar' => '127',
                'tipe_kamar_id' => 5, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(450000, 900000), // Harga antara Rp450.000 dan Rp900.000
                'no_kamar' => '128',
                'tipe_kamar_id' => 6, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'clean',
                'status_reservasi' => 'reserved',
                'harga' => rand(500000, 1000000), // Harga antara Rp500.000 dan Rp1.000.000
                'no_kamar' => '129',
                'tipe_kamar_id' => 7, // ID tipe kamar lainnya
            ],
            [
                'status_kamar' => 'dirty',
                'status_reservasi' => 'reserved',
                'harga' => rand(350000, 700000), // Harga antara Rp350.000 dan Rp700.000
                'no_kamar' => '130',
                'tipe_kamar_id' => 8, // ID tipe kamar lainnya
            ],
        ];
        DB::table('kamar')->insert($kamars);
    }
}
