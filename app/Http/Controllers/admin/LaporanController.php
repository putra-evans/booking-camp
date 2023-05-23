<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function cetak_laporan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bulan_tahun'      => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $explode = explode('-', $request->bulan_tahun);
        $tahun   = $explode[0];
        $bulan  = $explode[1];

        $data_booking = DB::table('ta_final_booking')
            ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
            ->whereYear('ta_final_booking.created_at', '=', $tahun)
            ->whereMonth('ta_final_booking.created_at', '=', $bulan)
            ->where('ta_final_booking.status_final', '=', 2)
            ->get();

        return view('admin.laporan.prev', [
            'data' => $data_booking,
            'tgl_cetak' => Carbon::parse(now())->translatedFormat('l, d F Y'),
            'tgl_laporan' => Carbon::parse($request->bulan_tahun)->translatedFormat('F Y')
        ]);
    }
}
