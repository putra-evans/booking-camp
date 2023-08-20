<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
                    ->where('B.tanggal_booking', '=',   $tgl_dipilih)
                    ->where('B.status_pesanan', '!=',   3);
            })
            ->orderBy('A.id_kavling', 'ASC')
            ->get();
        return response()->json($booking, 200);
    }


    public function booking_kavling(Request $request)
    {

        $userId = Auth::id();

        $status_akun = DB::table('users')->where('id', $userId)->get()->toArray();
        if ($status_akun[0]->status_akun == 0) {
            return response()->json('Profil Belum Lengkap', 403);
        }


        $id_kavling     = $request['id_kavling'];
        $tgl_dipilih    = $request['tgl_dipilih'];
        $nama_kavling   = $request['nama_kavling'];
        $explode = explode(" ", $tgl_dipilih);
        $tgl_asli = $explode[0];

        DB::table('ta_booking')->insert([
            'id_user' => $userId,
            'id_kavling' => $id_kavling,
            'no_booking' => '',
            'tanggal_booking' => $tgl_asli,
            'lama_menginap' => '1',
            'total_biaya' => '0',
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
        DB::table('ta_anggota')->where('id_booking', $request->id)->delete();
        return response()->json('Berhasil dihapus', 200);
    }

    public function proses_booking(Request $request)
    {
        $jam_masuk = $request->jam_masuk;
        $jam_keluar = $request->jam_keluar;
        $exp = Carbon::now()->addHour(2);

        $random = strtoupper(Str::random(10));
        $userId = Auth::id();
        $no_booking     = '#BO-KAV-' . $userId . '-' . $random;
        $id_booking = $request->id_booking;
        $lama_inap = 0;
        $total_biaya_final = 0;
        foreach ($id_booking as $key => $value) {
            $data_draft = DB::table('ta_booking')->where('id_booking', $value)->get()->toArray();
            $harga = intval($data_draft[0]->total_biaya);
            $inap = intval($data_draft[0]->lama_menginap);
            $total_biaya_final += $harga;
            $lama_inap += $inap;

            DB::table('ta_booking')
                ->where('id_booking', $value)
                ->update([
                    'no_booking' => $no_booking,
                    'status_pesanan' => 1
                ]);
            DB::table('ta_anggota')
                ->where('id_booking', $value)
                ->update([
                    'no_booking' => $no_booking,
                ]);
        }

        DB::table('ta_final_booking')->insert([
            'id_user' => $userId,
            'no_booking' => $no_booking,
            'total_menginap' => $lama_inap . "",
            'final_biaya' => $total_biaya_final . "",
            'status_final' => 0,
            'jam_masuk' => $jam_masuk,
            'jam_keluar' => $jam_keluar,
            'exp_date' => $exp,
        ]);
        return response()->json('Berhasil Booking', 200);
    }

    public function tambah_anggota(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_booking'                => 'required',
            'id_kavling'                => 'required',
            'nik'                       => 'required|unique:ta_anggota,nik',
            'nama_anggota'              => 'required',
            'umur_anggota'              => 'required',
            'jenis_kelamin_anggota'     => 'required',
            'status_anggota'            => 'required',
            'no_telp'                   => 'required',
            'alamat_lengkap_anggota'    => 'required',
            'riwayat_penyakit'          => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $jumlah_anggota = DB::table('ta_anggota')
            ->where('id_booking', $request->id_booking)
            ->count();
        if ($jumlah_anggota == 5) {
            return response()->json('Maksimal 5 anggota untuk 1 Kavling', 403);
        }


        $total_biaya = ($jumlah_anggota + 1) * 15000;
        DB::table('ta_booking')
            ->where('id_booking', $request->id_booking)
            ->update([
                'total_biaya' => $total_biaya
            ]);

        DB::table('ta_anggota')->insert([
            'id_booking'        => $request->id_booking,
            'id_kavling'        => $request->id_kavling,
            'nik'               => $request->nik,
            'nama_anggota'      => $request->nama_anggota,
            'umur_anggota'      => $request->umur_anggota,
            'jk_anggota'        => $request->jenis_kelamin_anggota,
            'status_anggota'    => $request->status_anggota,
            'notelp_anggota'    => $request->no_telp,
            'biaya_perorang'    => '15000',
            'alamat_lengkap_anggota'    => $request->alamat_lengkap_anggota,
            'riwayat_penyakit_anggota'  => $request->riwayat_penyakit,
        ]);
        return response()->json('Berhasil Tambah Anggota', 200);
    }
    public function tambah_anggota_ada(Request $request)
    {

        $id_anggota_lama = $request['id_anggota_lama'];
        $id_booking_baru = $request['id_booking_baru'];
        $id_kavling_baru = $request['id_kavling_baru'];

        $jumlah_anggota = DB::table('ta_anggota')
            ->where('id_booking', $id_booking_baru)
            ->count();
        if ($jumlah_anggota == 5) {
            return response()->json('Maksimal 5 anggota untuk 1 Kavling', 403);
        }


        $anggota_lama =  DB::table('ta_anggota')
            ->where('id_anggota', $id_anggota_lama)
            ->get();


        $anggota_baru =  DB::table('ta_anggota')
            ->where('id_booking', $id_booking_baru)
            ->where('id_kavling', $id_kavling_baru)
            ->get();

        if (!$anggota_baru->isEmpty()) {
            foreach ($anggota_baru as $key => $value) {
                $nik =  $value->nik;
                $nama =  $value->nama_anggota;
                if ($nik == $anggota_lama[0]->nik) {
                    return response()->json('Anggota Sudah Ada', 404);
                }
            }
        }

        $total_biaya = ($jumlah_anggota + 1) * 15000;
        DB::table('ta_booking')
            ->where('id_booking', $id_booking_baru)
            ->update([
                'total_biaya' => $total_biaya
            ]);

        DB::table('ta_anggota')->insert([
            'id_booking'        => $id_booking_baru,
            'id_kavling'        => $id_kavling_baru,
            'nik'               => $anggota_lama[0]->nik,
            'nama_anggota'      => $anggota_lama[0]->nama_anggota,
            'umur_anggota'      => $anggota_lama[0]->umur_anggota,
            'jk_anggota'        => $anggota_lama[0]->jk_anggota,
            'status_anggota'    => $anggota_lama[0]->status_anggota,
            'notelp_anggota'    => $anggota_lama[0]->notelp_anggota,
            'biaya_perorang'    => '15000',
            'alamat_lengkap_anggota'    => $anggota_lama[0]->alamat_lengkap_anggota,
            'riwayat_penyakit_anggota'  => $anggota_lama[0]->riwayat_penyakit_anggota,
        ]);
        return response()->json('Berhasil Tambah Anggota', 200);
    }

    public function get_anggota(Request $request)
    {
        $id = $request['id'];
        $booking =  DB::table('ta_anggota')
            ->where('id_booking', $id)
            ->orderBy('id_anggota', 'ASC')
            ->get();
        return response()->json($booking, 200);
    }
    public function get_anggota_ada(Request $request)
    {
        $id = $request['id'];
        $booking =  DB::table('ta_anggota')
            ->where('id_kavling', $id)
            ->orderBy('id_anggota', 'ASC')
            ->get();
        return response()->json($booking, 200);
    }

    public function destroy_anggota(Request $request)
    {
        $jumlah_anggota = DB::table('ta_anggota')
            ->where('id_booking', $request->id_booking)
            ->count();

        $total_biaya = ($jumlah_anggota - 1) * 15000;
        DB::table('ta_booking')
            ->where('id_booking', $request->id_booking)
            ->update([
                'total_biaya' => $total_biaya
            ]);
        DB::table('ta_anggota')->where('id_anggota', $request->id)->delete();
        return response()->json('Berhasil dihapus', 200);
    }

    public function AmbilKavlingAda(Request $request)
    {
        $userId = Auth::id();
        $anggota =  DB::table('ta_booking as A')
            ->select('A.*', 'B.*')
            ->join('ms_kavling as B', 'A.id_kavling', '=', 'B.id_kavling')
            ->where('A.status_pesanan', '=', 0)
            ->where('A.id_user', '=', $userId)
            ->where('A.id_booking', '!=', $request['id'])
            ->orderBy('A.id_kavling', 'ASC')
            ->get();
        return response()->json($anggota, 200);
    }
}
