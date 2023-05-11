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
        DB::table('ta_detail_booking')->delete();

        $ta_booking = [
            [
                'id_booking' => 1,
                'id_user' => 2,
                'no_booking' => 'BO001',
                'lama_menginap' => '2',
                'total_biaya' => '20000',
                'status_pesanan' => '1',
            ],
            [
                'id_booking' => 2,
                'id_user' => 3,
                'no_booking' => 'BO002',
                'lama_menginap' => '2',
                'total_biaya' => '20000',
                'status_pesanan' => '1',

            ],
            [
                'id_booking' => 3,
                'id_user' => 2,
                'no_booking' => 'BO003',
                'lama_menginap' => '2',
                'total_biaya' => '20000',
                'status_pesanan' => '1',
            ],
        ];
        $detail_ta_booking = [
            [
                'id_detail_booking' => 1,
                'id_booking' => 1,
                'id_kavling' => 1,
                'tanggal_booking' => '2023-05-12',
            ],
            [
                'id_detail_booking' => 2,
                'id_booking' => 1,
                'id_kavling' => 5,
                'tanggal_booking' => '2023-05-12',
            ],
            [
                'id_detail_booking' => 3,
                'id_booking' => 1,
                'id_kavling' => 3,
                'tanggal_booking' => '2023-05-12',
            ],



            [
                'id_detail_booking' => 4,
                'id_booking' => 2,
                'id_kavling' => 2,
                'tanggal_booking' => '2023-05-12',
            ],
            [
                'id_detail_booking' => 5,
                'id_booking' => 2,
                'id_kavling' => 4,
                'tanggal_booking' => '2023-05-12',
            ],
            [
                'id_detail_booking' => 6,
                'id_booking' => 2,
                'id_kavling' => 6,
                'tanggal_booking' => '2023-05-12',
            ],


            [
                'id_detail_booking' => 7,
                'id_booking' => 3,
                'id_kavling' => 1,
                'tanggal_booking' => '2023-05-13',
            ],
            [
                'id_detail_booking' => 8,
                'id_booking' => 3,
                'id_kavling' => 2,
                'tanggal_booking' => '2023-05-13',
            ],
            [
                'id_detail_booking' => 9,
                'id_booking' => 3,
                'id_kavling' => 3,
                'tanggal_booking' => '2023-05-13',
            ],
        ];
        DB::table('ta_booking')->insert($ta_booking);
        DB::table('ta_detail_booking')->insert($detail_ta_booking);
    }
}
