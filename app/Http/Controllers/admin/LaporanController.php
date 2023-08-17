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
            'tgl_laporan' => Carbon::parse($request->bulan_tahun)->translatedFormat('F Y'),
            'bulan_tahun' => $request->bulan_tahun
        ]);
    }

    public function print_laporan($bulantahun)
    {
        $explode    = explode('-', $bulantahun);
        $tahun      = $explode[0];
        $bulan      = $explode[1];

        $data_booking = DB::table('ta_final_booking')
            ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
            ->whereYear('ta_final_booking.created_at', '=', $tahun)
            ->whereMonth('ta_final_booking.created_at', '=', $bulan)
            ->where('ta_final_booking.status_final', '=', 2)
            ->get();

        return view('admin.laporan.print', [
            'data' => $data_booking,
            'tgl_cetak' => Carbon::parse(now())->translatedFormat('l, d F Y'),
            'tgl_laporan' => Carbon::parse($bulantahun)->translatedFormat('F Y'),
            'bulan_tahun' => $bulantahun
        ]);
    }




    // LAPORAN HARIAN

    public function cetak_laporan_harian(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tgl_laporan'      => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $data_booking = DB::table('ta_final_booking')
            ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
            ->whereDate('ta_final_booking.created_at', '=', $request->tgl_laporan)
            ->where('ta_final_booking.status_final', '=', 2)
            ->get();


        $data_anggota = DB::table('ta_anggota')
            ->groupBy('nik')
            ->get()
            ->toArray();


        $array_anggota = [];
        foreach ($data_anggota as $key => $pecah) {
            $array_anggota[$pecah->no_booking][] = array(
                'no_booking'        => $pecah->no_booking,
                'nik'               => $pecah->nik,
                'nama_anggota'      => $pecah->nama_anggota,
                'notelp_anggota'    => $pecah->notelp_anggota,
            );
        }




        $array_booking = [];
        foreach ($data_booking as $key => $value) {
            $array_booking[$key] = array(
                'id_final_booking'      => $value->id_final_booking,
                'id_user'               => $value->id_user,
                'no_booking'            => $value->no_booking,
                'total_menginap'        => $value->total_menginap,
                'final_biaya'           => $value->final_biaya,
                'status_final'          => $value->status_final,
                'created_at'            => $value->created_at,
                'updated_at'            => $value->updated_at,
                'name'                  => $value->name,
                'email'                 => $value->email,
                'no_telp'               => $value->no_telp,
                'nama_panggilan'        => $value->nama_panggilan,
                'jenis_kelamin'         => $value->jenis_kelamin,
                'anggota'               => isset($array_anggota[$value->no_booking]) ? $array_anggota[$value->no_booking] : [],
            );
        }
        return view('admin.laporan.harian_prev', [
            'data' => $array_booking,
            'tgl_cetak' => Carbon::parse(now())->translatedFormat('l, d F Y'),
            'tgl_laporan' => Carbon::parse($request->tgl_laporan)->translatedFormat('d F Y'),
            'tglnya' => $request->tgl_laporan,
        ]);
    }

    public function print_laporan_harian($tgl_laporan)
    {

        $data_booking = DB::table('ta_final_booking')
            ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
            ->whereDate('ta_final_booking.created_at', '=', $tgl_laporan)
            ->where('ta_final_booking.status_final', '=', 2)
            ->get();


        $data_anggota = DB::table('ta_anggota')
            ->groupBy('nik')
            ->get()
            ->toArray();


        $array_anggota = [];
        foreach ($data_anggota as $key => $pecah) {
            $array_anggota[$pecah->no_booking][] = array(
                'no_booking'        => $pecah->no_booking,
                'nik'               => $pecah->nik,
                'nama_anggota'      => $pecah->nama_anggota,
                'notelp_anggota'    => $pecah->notelp_anggota,
            );
        }




        $array_booking = [];
        foreach ($data_booking as $key => $value) {
            $array_booking[$key] = array(
                'id_final_booking'      => $value->id_final_booking,
                'id_user'               => $value->id_user,
                'no_booking'            => $value->no_booking,
                'total_menginap'        => $value->total_menginap,
                'final_biaya'           => $value->final_biaya,
                'status_final'          => $value->status_final,
                'created_at'            => $value->created_at,
                'updated_at'            => $value->updated_at,
                'name'                  => $value->name,
                'email'                 => $value->email,
                'no_telp'               => $value->no_telp,
                'nama_panggilan'        => $value->nama_panggilan,
                'jenis_kelamin'         => $value->jenis_kelamin,
                'anggota'               => isset($array_anggota[$value->no_booking]) ? $array_anggota[$value->no_booking] : [],
            );
        }
        return view('admin.laporan.harian_print', [
            'data' => $array_booking,
            'tgl_cetak' => Carbon::parse(now())->translatedFormat('l, d F Y'),
            'tgl_laporan' => Carbon::parse($tgl_laporan)->translatedFormat('d F Y'),
        ]);
    }
}
