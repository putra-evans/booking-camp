<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $booking = DB::table('ms_kavling as A')
            ->where('A.status_kavling', '1')
            ->leftJoin('ta_booking as B', 'A.id_kavling', '=', 'B.id_kavling')
            ->orderBy('A.id_kavling', 'ASC')

            ->get();
        // dd($booking);
        return view('user.booking.index', ['booking' => $booking]);
    }
}
