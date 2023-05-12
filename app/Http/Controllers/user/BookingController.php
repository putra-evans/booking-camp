<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            ->leftjoin('ta_booking as B', function (JoinClause $join) use ($tgl_dipilih) {
                $join->on('B.id_kavling', '=', 'A.id_kavling')
                    ->where('B.tanggal_booking', '=',   $tgl_dipilih);
            })
            ->orderBy('A.id_kavling', 'ASC')
            ->get();
        return response()->json($booking, 200);
    }


    public function booking_kavling(Request $request)
    {

        $random = strtoupper(Str::random(10));
        $userId = Auth::id();
        $id_kavling     = $request['id_kavling'];
        $tgl_dipilih    = $request['tgl_dipilih'];
        $nama_kavling   = $request['nama_kavling'];
        $explode = explode(" ", $tgl_dipilih);
        $tgl_asli = $explode[0];
        $no_booking     = 'BOKAV-' . $userId . '-' . $tgl_asli  . '-' . $random;

        DB::table('ta_booking')->insert([
            'id_user' => $userId,
            'id_kavling' => $id_kavling,
            'no_booking' => $no_booking,
            'tanggal_booking' => $tgl_asli,
            'lama_menginap' => 0,
            'status_pesanan' => 0,
        ]);
        // $lastInsertId = DB::getPdo()->lastInsertId();
        // DB::table('ta_detail_booking')->insert([
        //     'id_booking' => $lastInsertId,

        // ]);
        return response()->json('Berhasil Booking', 200);
    }

    public function draft_booking()
    {
        $userId = Auth::id();
        $booking =  DB::table('ta_booking as A')
            ->join('ms_kavling as B', 'A.id_kavling', '=', 'B.id_kavling')
            ->where('A.id_user', '=', $userId)
            ->where('A.status_pesanan', '=', 0)
            ->orderBy('A.id_booking', 'DESC')
            ->get();
        return response()->json($booking, 200);
    }

    public function destroy_booking(Request $request)
    {
        DB::table('ta_booking')->where('id_booking', $request->id)->delete();
        return response()->json('Berhasil dihapus', 200);
    }
}