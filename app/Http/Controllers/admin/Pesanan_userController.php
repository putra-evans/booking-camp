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
                    if ($item->status_final == 0) {
                        $status = '<button type="button" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-close-circle me-1"></i> Belum Bayar</button>';
                    } else if ($item->status_final == 1) {
                        $status = '<button type="button" class="btn btn-outline-twitter waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"> Pembayaran Diproses</i></button>';
                    } else if ($item->status_final == 2) {
                        $status = '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"> Pembayaran Diterima</i></button>';
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
                    }
                    return $total;
                })
                ->addColumn('file_pembayaran', function ($item) {
                    if ($item->nama_file_pembayaran == null) {
                        $file = '<button type="button" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-close-circle me-1"></i> Tidak ada file</button>';
                    } else {
                        $file = '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1" data-bs-toggle="modal" data-bs-target="#LIhatBukti" id="lihat_bukti" data-img="' . url('/foto_pembayaran/' . $item->nama_file_pembayaran) . '"> Lihat File</i></button>';
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
                        $total = '<button type="button" class="btn btn-text-success text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    }
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya', 'file_pembayaran'])
                ->make(true);
        }
        return view('admin.pesanan_user.index', [
            // 'kabkota' => $city
        ]);
    }
}
