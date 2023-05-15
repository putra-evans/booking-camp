<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class Pesanan_userController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pesanan_user = DB::table('ta_final_booking')
                ->leftJoin('ta_file_pembayaran', 'ta_file_pembayaran.id_final_booking', '=', 'ta_final_booking.id_final_booking')
                ->where('ta_final_booking.status_final', 0)
                ->orderBy('ta_final_booking.created_at', 'DESC')
                ->select('ta_final_booking.*', 'ta_file_pembayaran.nama_file_pembayaran', 'ta_file_pembayaran.ctt_pembayaran')
                ->get();

            return Datatables::of($pesanan_user)
                ->addIndexColumn()
                ->addColumn('status_pesanan', function ($item) {
                    $status = '<button type="button" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-close-circle me-1"></i> Belum Bayar</button>';
                    return $status;
                })
                ->addColumn('lama_inap', function ($item) {
                    $lama_inap = $item->total_menginap . ' Malam';
                    return $lama_inap;
                })
                ->addColumn('total_biaya', function ($item) {
                    $total = '<button type="button" class="btn btn-text-danger text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    return $total;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>
                    <button type="button" data-id="' . $item->id_final_booking . '" title="Hapus data" class="btn btn-icon btn-danger waves-effect waves-light" id="BtnHapus"><span class="fa-regular fa-trash-can"></span></button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya'])
                ->make(true);
        }
        return view('admin.pesanan_user.index', [
            // 'kabkota' => $city
        ]);
    }
    public function list_diproses(Request $request)
    {
        if ($request->ajax()) {
            $pesanan_user = DB::table('ta_final_booking')
                ->leftJoin('ta_file_pembayaran', 'ta_file_pembayaran.id_final_booking', '=', 'ta_final_booking.id_final_booking')
                ->where('ta_final_booking.status_final', 1)
                ->orderBy('ta_final_booking.created_at', 'DESC')
                ->select('ta_final_booking.*', 'ta_file_pembayaran.nama_file_pembayaran', 'ta_file_pembayaran.ctt_pembayaran')
                ->get();

            return Datatables::of($pesanan_user)
                ->addIndexColumn()
                ->addColumn('status_pesanan', function ($item) {
                    $status = '<button type="button" class="btn btn-outline-twitter waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"> Diproses</i></button>';
                    return $status;
                })
                ->addColumn('lama_inap', function ($item) {
                    $lama_inap = $item->total_menginap . ' Malam';
                    return $lama_inap;
                })
                ->addColumn('total_biaya', function ($item) {
                    $total = '<button type="button" class="btn btn-text-info text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    return $total;
                })
                ->addColumn('file_pembayaran', function ($item) {
                    $file = '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1" data-bs-toggle="modal" data-bs-target="#LIhatBukti" id="lihat_bukti" data-img="' . url('/foto_pembayaran/' . $item->nama_file_pembayaran) . '"> Lihat File</i></button>';
                    return $file;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>
                    <button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Upload Bukti Pembayaran" class="btn btn-icon btn-info waves-effect waves-light" id="BtnUploadPembayaran"><span class="mdi mdi-upload"></span></button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya', 'file_pembayaran'])
                ->make(true);
        }
        return view('admin.pesanan_user.index', [
            // 'kabkota' => $city
        ]);
    }
    public function list_diterima(Request $request)
    {
        if ($request->ajax()) {
            $pesanan_user = DB::table('ta_final_booking')
                ->leftJoin('ta_file_pembayaran', 'ta_file_pembayaran.id_final_booking', '=', 'ta_final_booking.id_final_booking')
                ->where('ta_final_booking.status_final', 2)
                ->orderBy('ta_final_booking.created_at', 'DESC')
                ->select('ta_final_booking.*', 'ta_file_pembayaran.nama_file_pembayaran', 'ta_file_pembayaran.ctt_pembayaran')
                ->get();

            return Datatables::of($pesanan_user)
                ->addIndexColumn()
                ->addColumn('status_pesanan', function ($item) {
                    $status = '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"> Diterima</i></button>';
                    return $status;
                })
                ->addColumn('lama_inap', function ($item) {
                    $lama_inap = $item->total_menginap . ' Malam';
                    return $lama_inap;
                })
                ->addColumn('total_biaya', function ($item) {
                    $total = '<button type="button" class="btn btn-text-success text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    return $total;
                })
                ->addColumn('file_pembayaran', function ($item) {
                    $file = '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1" data-bs-toggle="modal" data-bs-target="#LIhatBukti" id="lihat_bukti" data-img="' . url('/foto_pembayaran/' . $item->nama_file_pembayaran) . '"> Lihat File</i></button>';
                    return $file;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>';
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya', 'file_pembayaran'])
                ->make(true);
        }
        return view('admin.pesanan_user.index', [
            // 'kabkota' => $city
        ]);
    }
    public function list_dibatalkan(Request $request)
    {
        if ($request->ajax()) {
            $pesanan_user = DB::table('ta_final_booking')
                ->leftJoin('ta_file_pembayaran', 'ta_file_pembayaran.id_final_booking', '=', 'ta_final_booking.id_final_booking')
                ->where('ta_final_booking.status_final', 2)
                ->orderBy('ta_final_booking.created_at', 'DESC')
                ->select('ta_final_booking.*', 'ta_file_pembayaran.nama_file_pembayaran', 'ta_file_pembayaran.ctt_pembayaran')
                ->get();

            return Datatables::of($pesanan_user)
                ->addIndexColumn()
                ->addColumn('status_pesanan', function ($item) {
                    $status = '<button type="button" class="btn btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"> Dibatalkan</i></button>';
                    return $status;
                })
                ->addColumn('lama_inap', function ($item) {
                    $lama_inap = $item->total_menginap . ' Malam';
                    return $lama_inap;
                })
                ->addColumn('total_biaya', function ($item) {
                    $total = '<button type="button" class="btn btn-text-danger text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    return $total;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>';
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya'])
                ->make(true);
        }
        return view('admin.pesanan_user.index', [
            // 'kabkota' => $city
        ]);
    }
}
