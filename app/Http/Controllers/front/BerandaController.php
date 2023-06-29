<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index()
    {
        // $id_user = Auth::user()->id;
        // $data_user = DB::table('users')->where('id', '=', $id_user)->get();
        $data_galeri = DB::table('ms_galeri')
            ->orderBy('id_galeri', 'DESC')
            ->get();
        $syarat  =  DB::table('ms_syarat_ketentuan')->get();
        $tata_tertib  =  DB::table('ms_tata_tertib')->get();
        $cara_booking  =  DB::table('ms_cara_booking')->get();
        return view('frontpage.home', [
            'galeri' => $data_galeri,
            'syarat' => $syarat,
            'tata_tertib' => $tata_tertib,
            'cara_booking' => $cara_booking
        ]);
    }
}
