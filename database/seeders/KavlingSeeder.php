<?php

namespace Database\Seeders;

use App\Models\Ms_kavling;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KavlingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ms_kavling::create(
        DB::table('ms_kavling')->delete();

        $kavling = [
            [
                // 'id_kavling' => 1,
                'nama_kavling' => 'Kavling 1',
                'kode_kavling' => 'K1',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 2,
                'nama_kavling' => 'Kavling 2',
                'kode_kavling' => 'K2',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 3,
                'nama_kavling' => 'Kavling 3',
                'kode_kavling' => 'K3',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 4,
                'nama_kavling' => 'Kavling 4',
                'kode_kavling' => 'K4',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 5,
                'nama_kavling' => 'Kavling 5',
                'kode_kavling' => 'K5',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 6,
                'nama_kavling' => 'Kavling 6',
                'kode_kavling' => 'K6',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 7,
                'nama_kavling' => 'Kavling 7',
                'kode_kavling' => 'K7',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 8,
                'nama_kavling' => 'Kavling 8',
                'kode_kavling' => 'K8',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 9,
                'nama_kavling' => 'Kavling 9',
                'kode_kavling' => 'K9',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 10,
                'nama_kavling' => 'Kavling 10',
                'kode_kavling' => 'K10',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 11,
                'nama_kavling' => 'Kavling 11',
                'kode_kavling' => 'K11',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 12,
                'nama_kavling' => 'Kavling 12',
                'kode_kavling' => 'K12',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 13,
                'nama_kavling' => 'Kavling 13',
                'kode_kavling' => 'K13',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 14,
                'nama_kavling' => 'Kavling 14',
                'kode_kavling' => 'K14',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 15,
                'nama_kavling' => 'Kavling 15',
                'kode_kavling' => 'K15',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 16,
                'nama_kavling' => 'Kavling 16',
                'kode_kavling' => 'K16',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 17,
                'nama_kavling' => 'Kavling 17',
                'kode_kavling' => 'K17',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 18,
                'nama_kavling' => 'Kavling 18',
                'kode_kavling' => 'K18',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 19,
                'nama_kavling' => 'Kavling 19',
                'kode_kavling' => 'K19',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 20,
                'nama_kavling' => 'Kavling 20',
                'kode_kavling' => 'K20',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 21,
                'nama_kavling' => 'Kavling 21',
                'kode_kavling' => 'K21',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 22,
                'nama_kavling' => 'Kavling 22',
                'kode_kavling' => 'K22',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 23,
                'nama_kavling' => 'Kavling 23',
                'kode_kavling' => 'K23',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 24,
                'nama_kavling' => 'Kavling 24',
                'kode_kavling' => 'K24',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 25,
                'nama_kavling' => 'Kavling 25',
                'kode_kavling' => 'K25',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 26,
                'nama_kavling' => 'Kavling 26',
                'kode_kavling' => 'K26',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 27,
                'nama_kavling' => 'Kavling 27',
                'kode_kavling' => 'K27',
                'status_kavling' => '1',
            ],
            [
                // 'id_kavling' => 28,
                'nama_kavling' => 'Kavling 28',
                'kode_kavling' => 'K28',
                'status_kavling' => '1',
            ],
        ];
        DB::table('ms_kavling')->insert($kavling);
    }
}
