<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        return view('user.booking.index');
    }

    public function get_booking(Request $request)
    {
        $tgl_dipilih = $request['tgl_dipilih'];
        $booking =  DB::table('ms_kavling as A')
            ->select('A.id_kavling as id_ms_kavling', 'A.kode_kavling', 'A.nama_kavling', 'B.*')
            ->leftjoin('ta_detail_booking as B', function (JoinClause $join) use ($tgl_dipilih) {
                $join->on('B.id_kavling', '=', 'A.id_kavling')
                    ->where('B.tanggal_booking', '=',   $tgl_dipilih);
            })
            ->orderBy('A.id_kavling', 'ASC')
            ->get();
        return response()->json($booking, 200);
    }
}
