<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $userId = Auth::id();
            $pesanan_user = DB::table('ta_final_booking')
                ->leftJoin('ta_file_pembayaran', 'ta_file_pembayaran.id_final_booking', '=', 'ta_final_booking.id_final_booking')
                ->where('ta_final_booking.id_user', $userId)
                ->orderBy('ta_final_booking.created_at', 'DESC')
                ->select('ta_final_booking.*', 'ta_file_pembayaran.nama_file_pembayaran', 'ta_file_pembayaran.ctt_pembayaran')
                ->get();

            return Datatables::of($pesanan_user)
                ->addIndexColumn()
                ->addColumn('status_pesanan', function ($item) {
                    if ($item->status_final == 0) {
                        $status = '<button type="button" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-close-circle me-1"></i> Belum Bayar</button>';
                    } else if ($item->status_final == 1) {
                        $status = '<button type="button" class="btn rounded-pill btn-outline-twitter waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"> </i>Diproses</button>';
                    } else if ($item->status_final == 2) {
                        $status = '<button type="button" class="btn rounded-pill btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"></i>Diterima</button>';
                    } else if ($item->status_final == 3) {
                        $status = '<button type="button" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-close-circle me-1"></i>Dibatalkan</button>';
                    }
                    return $status;
                })
                ->addColumn('lama_inap', function ($item) {
                    $lama_inap = $item->total_menginap . ' Malam';
                    return $lama_inap;
                })
                ->addColumn('total_biaya', function ($item) {
                    if ($item->status_final == 0) {
                        $total = '<button type="button" class="btn btn-text-danger text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    } else if ($item->status_final == 1) {
                        $total = '<button type="button" class="btn btn-text-info text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    } else if ($item->status_final == 2) {
                        $total = '<button type="button" class="btn btn-text-success text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    } else {
                        $total = '<button type="button" class="btn btn-text-danger text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    }
                    return $total;
                })
                ->addColumn('file_pembayaran', function ($item) {
                    if ($item->nama_file_pembayaran == null) {
                        $file = '<button type="button" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-close-circle me-1"></i> Tidak ada file</button>';
                    } else {
                        $file = '<button type="button" data-bs-toggle="modal" data-bs-target="#LIhatBukti" id="lihat_bukti" data-img="' . url('/foto_pembayaran/' . $item->nama_file_pembayaran) . '" class="btn rounded-pill btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"></i> Lihat File</button>';
                    }
                    return $file;
                })
                ->addColumn('action', function ($item) {
                    if ($item->status_final == 0) {
                        $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>
                        <button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Upload Bukti Pembayaran" class="btn btn-icon btn-info waves-effect waves-light" id="BtnUploadPembayaran"><span class="mdi mdi-upload"></span></button>
                        ';
                    } else if ($item->status_final == 1) {
                        $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>';
                    } else if ($item->status_final == 2) {
                        $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button> <a href="' . url('cetak_invoice/' . $item->id_final_booking) . '" title="Cetak Invoice" class="btn btn-icon btn-success waves-effect waves-light" id="BtnCetak"><span class="mdi mdi-printer-outline"></span></a>';
                    } else {
                        $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>';
                    }
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya', 'file_pembayaran'])
                ->make(true);
        }
        return view('user.pesanan.index', [
            // 'kabkota' => $city
        ]);
    }


    public function get_detail_pesanan(Request $request)
    {
        $data_booking = DB::table('ta_final_booking')
            ->join('users', 'users.id', '=', 'ta_final_booking.id_user')
            ->where('ta_final_booking.id_final_booking', $request->id)
            ->get();
        return response()->json($data_booking, 200);
    }

    public function list_booking(Request $request)
    {
        $no_booking = $request->no_booking;
        $booking =  DB::table('ta_booking as A')
            ->join('ms_kavling as B', 'A.id_kavling', '=', 'B.id_kavling')
            ->where('A.no_booking', '=', $no_booking)
            ->orderBy('A.id_booking', 'DESC')
            ->get();
        return response()->json($booking, 200);
    }
    public function upload_pembayaran(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ctt_pembayaran'      => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $userId = Auth::id();
        $id_final_booking = $request->id_final_booking;
        $no_booking = $request->no_booking_final;
        $ctt_pembayaran = $request->ctt_pembayaran;

        $tujuan_upload = 'foto_pembayaran';
        $file = $request->file('bukti_pembayaran');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama_file);

        $data_file = DB::table('ta_file_pembayaran')
            ->where('id_final_booking', '=', $id_final_booking)
            ->where('no_booking', '=', $no_booking)
            ->first();

        if ($data_file != null) {
            $location = public_path('foto_pembayaran/' . $data_file->nama_file_pembayaran);
            unlink($location);
            DB::table('ta_file_pembayaran')
                ->where('id_final_booking', '=', $id_final_booking)
                ->where('no_booking', '=', $no_booking)
                ->update([
                    'nama_file_pembayaran'  => $nama_file,
                    'ctt_pembayaran'        => $ctt_pembayaran
                ]);
            DB::table('ta_final_booking')
                ->where('id_final_booking', '=', $id_final_booking)
                ->where('no_booking', '=', $no_booking)
                ->update([
                    'status_final'  => 1,
                ]);
            return response()->json('Berhasil melakukan upload ulang bukti pembayaran', 200);
        } else {
            DB::table('ta_file_pembayaran')
                ->insert([
                    'id_final_booking'      => $id_final_booking,
                    'id_user'               => $userId,
                    'no_booking'            => $no_booking,
                    'nama_file_pembayaran'  => $nama_file,
                    'ctt_pembayaran'        => $ctt_pembayaran
                ]);
            DB::table('ta_final_booking')
                ->where('id_final_booking', '=', $id_final_booking)
                ->where('no_booking', '=', $no_booking)
                ->update([
                    'status_final'  => 1,
                ]);
            return response()->json('Berhasil melakukan upload', 200);
        }
    }

    public function get_all_anggota(Request $request)
    {
        $no_booking = $request['no_booking'];
        $booking =  DB::table('ta_anggota')
            // ->join('ta_bookin', 'ta_booking.no_booking', '=', 'ta_anggota.no_booking')
            // ->join('ms_kavling', 'ms_kavling.id_kavling', '=', 'ta_booking.id_kavling')
            ->where('ta_anggota.no_booking', $no_booking)
            ->orderBy('ta_anggota.id_anggota', 'ASC')
            ->get();

        return response()->json($booking, 200);
    }
}
