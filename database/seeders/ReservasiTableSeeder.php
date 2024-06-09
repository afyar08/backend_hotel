<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ModelKamar; // Ensure you import the ModelKamar class
use Carbon\Carbon;

class ReservasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservasiData = [];

        for ($i = 1; $i <= 10; $i++) {
            $checkInDate = Carbon::now()->addDays($i);
            $duration = rand(1, 5); // Random duration between 1 and 5 days
            $checkOutDate = $checkInDate->copy()->addDays($duration);
            $roomTotal = rand(1, 3); // Number of rooms
            $adult = rand(1, 4); // Number of adults
            $children = rand(0, 2); // Number of children

            // Get a random room and its price
            $kamar = ModelKamar::inRandomOrder()->first();
            if ($kamar) {
                $roomPrice = $kamar->harga;

                // Calculate subtotal
                $extra = rand(50000, 150000); // Additional charges
                $subTotal = ($roomPrice * $duration * $roomTotal) + $extra;

                $reservasiData[] = [
                    'tgl_check_in' => $checkInDate,
                    'tgl_check_out' => $checkOutDate,
                    'id_tamu' => rand(1, 2),
                    'detail_tamu' => 'Detail tamu ' . $i,
                    'pembayaran' => 'Cash',
                    'total_bayar' => $subTotal, // Total payment matches the sub_total
                    'status_pembayaran' => 'Lunas',
                    'id_kamar' => $kamar->id, // Using the randomly selected room ID
                    'id_resepsionis' => 1,
                    'room_plan' => 'Plan ' . $i,
                    'request' => 'Request ' . $i,
                    'reservation_by' => 'Guest ' . $i,
                    'duration' => $duration,
                    'room_total' => $roomTotal,
                    'adult' => $adult,
                    'children' => $children,
                    'extra' => $extra,
                    'sub_total' => $subTotal,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('reservasi')->insert($reservasiData);
    }
}
