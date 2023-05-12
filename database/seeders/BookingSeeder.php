<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ta_booking')->delete();

        $ta_booking = [
            [
                'id_booking' => 1,
                'id_user' => 2,
                'id_kavling' => 1,
                'no_booking' => 'BO001',
                'tanggal_booking' => '2023-06-12',
                'lama_menginap' => 0,
                'total_biaya' => 0,
                'status_pesanan' => '0',
            ],
            [
                'id_booking' => 2,
                'id_user' => 3,
                'id_kavling' => 10,
                'no_booking' => 'BO001',
                'tanggal_booking' => '2023-06-12',
                'lama_menginap' => 0,
                'total_biaya' => 0,
                'status_pesanan' => '0',
            ],
            [
                'id_booking' => 3,
                'id_user' => 2,
                'id_kavling' => 15,
                'no_booking' => 'BO001',
                'tanggal_booking' => '2023-06-13',
                'lama_menginap' => 0,
                'total_biaya' => 0,
                'status_pesanan' => '0',
            ],
            [
                'id_booking' => 4,
                'id_user' => 2,
                'id_kavling' => 12,
                'no_booking' => 'BO001',
                'tanggal_booking' => '2023-06-13',
                'lama_menginap' => 0,
                'total_biaya' => 0,
                'status_pesanan' => '0',
            ],
            [
                'id_booking' => 5,
                'id_user' => 2,
                'id_kavling' => 8,
                'no_booking' => 'BO001',
                'tanggal_booking' => '2023-06-13',
                'lama_menginap' => 0,
                'total_biaya' => 0,
                'status_pesanan' => '0',
            ],
        ];
        DB::table('ta_booking')->insert($ta_booking);
    }
}
