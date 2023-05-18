<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Carbon;

class Pesanan_userController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pesanan_user = DB::table('ta_final_booking')
                ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
                ->leftJoin('ta_file_pembayaran', 'ta_file_pembayaran.id_final_booking', '=', 'ta_final_booking.id_final_booking')
                ->where('ta_final_booking.status_final', 0)
                ->orderBy('ta_final_booking.created_at', 'DESC')
                ->select('ta_final_booking.*', 'ta_file_pembayaran.nama_file_pembayaran', 'ta_file_pembayaran.ctt_pembayaran', 'users.name')
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
                ->addColumn('tgl_dibuat', function ($item) {
                    $registeredAt = Carbon::parse($item->created_at)->translatedFormat('l, d F Y');
                    return $registeredAt;
                })
                ->addColumn('total_biaya', function ($item) {
                    $total = '<button type="button" class="btn btn-text-danger text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    return $total;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>
                    <button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Batalkan Pesanan" class="btn btn-icon btn-danger waves-effect waves-light" id="BtnBatalkan"><span class="mdi mdi-close-box"></span></button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya', 'tgl_dibuat'])
                ->make(true);
        }
        return view('admin.pesanan_user.index', []);
    }
    public function list_diproses(Request $request)
    {
        if ($request->ajax()) {
            $pesanan_user = DB::table('ta_final_booking')
                ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
                ->leftJoin('ta_file_pembayaran', 'ta_file_pembayaran.id_final_booking', '=', 'ta_final_booking.id_final_booking')
                ->where('ta_final_booking.status_final', 1)
                ->orderBy('ta_final_booking.created_at', 'DESC')
                ->select('ta_final_booking.*', 'ta_file_pembayaran.nama_file_pembayaran', 'ta_file_pembayaran.ctt_pembayaran', 'users.name')
                ->get();

            return Datatables::of($pesanan_user)
                ->addIndexColumn()
                ->addColumn('status_pesanan', function ($item) {
                    $status = '<button type="button" class="btn rounded-pill btn-outline-twitter waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"></i> Diproses</button>';
                    return $status;
                })
                ->addColumn('lama_inap', function ($item) {
                    $lama_inap = $item->total_menginap . ' Malam';
                    return $lama_inap;
                })
                ->addColumn('tgl_dibuat', function ($item) {
                    $registeredAt = Carbon::parse($item->created_at)->translatedFormat('l, d F Y');
                    return $registeredAt;
                })
                ->addColumn('total_biaya', function ($item) {
                    $total = '<button type="button" class="btn btn-text-info text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    return $total;
                })
                ->addColumn('file_pembayaran', function ($item) {
                    $file = '<button type="button" data-bs-toggle="modal" data-bs-target="#LIhatBukti" id="lihat_bukti" data-img="' . url('/foto_pembayaran/' . $item->nama_file_pembayaran) . '" class="btn rounded-pill btn-outline-twitter waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"></i> Lihat File</button>';
                    return $file;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>
                    <button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Proses Pembayaran" class="btn btn-icon btn-info waves-effect waves-light" id="BtnProsesPembayaran"><span class="mdi mdi-shield-check-outline"></span></button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya', 'file_pembayaran', 'tgl_dibuat'])
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
                ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
                ->leftJoin('ta_file_pembayaran', 'ta_file_pembayaran.id_final_booking', '=', 'ta_final_booking.id_final_booking')
                ->where('ta_final_booking.status_final', 2)
                ->orderBy('ta_final_booking.created_at', 'DESC')
                ->select('ta_final_booking.*', 'ta_file_pembayaran.nama_file_pembayaran', 'ta_file_pembayaran.ctt_pembayaran', 'users.name')
                ->get();

            return Datatables::of($pesanan_user)
                ->addIndexColumn()
                ->addColumn('status_pesanan', function ($item) {
                    $status = '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"> </i>Diterima</button>';
                    return $status;
                })
                ->addColumn('lama_inap', function ($item) {
                    $lama_inap = $item->total_menginap . ' Malam';
                    return $lama_inap;
                })
                ->addColumn('tgl_dibuat', function ($item) {
                    $registeredAt = Carbon::parse($item->created_at)->translatedFormat('l, d F Y');
                    return $registeredAt;
                })
                ->addColumn('total_biaya', function ($item) {
                    $total = '<button type="button" class="btn btn-text-success text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    return $total;
                })
                ->addColumn('file_pembayaran', function ($item) {
                    $file = '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs" data-bs-toggle="modal" data-bs-target="#LIhatBukti" id="lihat_bukti" data-img="' . url('/foto_pembayaran/' . $item->nama_file_pembayaran) . '"> <i class="tf-icons mdi mdi-check-decagram me-1"></i> Lihat File</button>';
                    return $file;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button> <a href="' . url('cetak_invoice/' . $item->id_final_booking) . '" title="Cetak Invoice" class="btn btn-icon btn-success waves-effect waves-light" id="BtnCetak"><span class="mdi mdi-printer-outline"></span></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya', 'file_pembayaran', 'tgl_dibuat'])
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
                ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
                ->leftJoin('ta_file_pembayaran', 'ta_file_pembayaran.id_final_booking', '=', 'ta_final_booking.id_final_booking')
                ->where('ta_final_booking.status_final', 3)
                ->orderBy('ta_final_booking.created_at', 'DESC')
                ->select('ta_final_booking.*', 'ta_file_pembayaran.nama_file_pembayaran', 'ta_file_pembayaran.ctt_pembayaran', 'users.name')
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
                ->addColumn('tgl_dibuat', function ($item) {
                    $registeredAt = Carbon::parse($item->created_at)->translatedFormat('l, d F Y');
                    return $registeredAt;
                })
                ->addColumn('total_biaya', function ($item) {
                    $total = '<button type="button" class="btn btn-text-danger text-bold waves-effect waves-light">Rp. ' . number_format($item->final_biaya) . '</button>';
                    return $total;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_final_booking . '" data-no_booking="' . $item->no_booking . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>';
                    return $btn;
                })
                ->rawColumns(['action', 'status_pesanan', 'lama_inap', 'total_biaya', 'tgl_dibuat'])
                ->make(true);
        }
        return view('admin.pesanan_user.index', [
            // 'kabkota' => $city
        ]);
    }

    public function batalkan_pesanan(Request $request)
    {
        $id_final_booking = $request['id'];
        $no_booking = $request['no_booking'];

        DB::table('ta_final_booking')
            ->where('id_final_booking', '=', $id_final_booking)
            ->where('no_booking', '=', $no_booking)
            ->update([
                'status_final'  => 3
            ]);
        DB::table('ta_booking')
            ->where('no_booking', '=', $no_booking)
            ->update([
                'status_pesanan'  => 3
            ]);
        return response()->json('Berhasil batalkan pesanan', 200);
    }
    public function proses_pembayaran(Request $request)
    {
        $id_final_booking   = $request['id'];
        $no_booking         = $request['no_booking'];
        $status             = $request['status'];

        if ($status == 3) {
            DB::table('ta_final_booking')
                ->where('id_final_booking', '=', $id_final_booking)
                ->where('no_booking', '=', $no_booking)
                ->update([
                    'status_final'  => $status
                ]);
            if ($status == 3) {
                DB::table('ta_booking')
                    ->where('no_booking', '=', $no_booking)
                    ->update([
                        'status_pesanan'  => 3
                    ]);
            }
        } else {
            DB::table('ta_final_booking')
                ->where('id_final_booking', '=', $id_final_booking)
                ->where('no_booking', '=', $no_booking)
                ->update([
                    'status_final'  => $status
                ]);
        }

        return response()->json('Berhasil batalkan pesanan', 200);
    }

    public function cetak_invoice($id)
    {
        $data_booking = DB::table('ta_final_booking')
            ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
            ->where('ta_final_booking.id_final_booking', '=', $id)
            ->select('ta_final_booking.*', 'users.*')
            ->get()
            ->toArray();

        $array_file = [];
        $rincian_file = DB::table('ta_file_pembayaran')
            ->select('ta_file_pembayaran.*')
            ->get()
            ->toArray();
        foreach ($rincian_file as $key => $pecah1) {
            $array_file[$pecah1->no_booking] = [
                'nama_file_pembayaran'  => $pecah1->nama_file_pembayaran,
                'ctt_pembayaran'        => $pecah1->ctt_pembayaran,
            ];
        }

        $array_rincian = [];
        $rincian_boking = DB::table('ta_booking')
            ->Join('ms_kavling', 'ta_booking.id_kavling', '=', 'ms_kavling.id_kavling')
            ->select('ta_booking.*', 'ms_kavling.*')
            ->get()
            ->toArray();
        foreach ($rincian_boking as $key => $pecah) {
            $array_rincian[$pecah->no_booking][] = [
                'kode_kavling'      => $pecah->kode_kavling,
                'nama_kavling'      => $pecah->nama_kavling,
                'tanggal_booking'   => Carbon::parse($pecah->tanggal_booking)->translatedFormat('l, d F Y'),
                'lama_menginap'     => $pecah->lama_menginap,
                'total_biaya'       => $pecah->total_biaya,
            ];
        }

        $array_usulan = [];
        foreach ($data_booking as $key => $value) {

            $array_usulan[$key] = [
                'id_final_booking'  => $value->id_final_booking,
                'name'              => $value->name,
                'email'             => $value->email,
                'no_telp'           => $value->no_telp,
                'alamat_lengkap'    => $value->alamat_lengkap,
                'no_booking'        => $value->no_booking,
                'total_menginap'    => $value->total_menginap,
                'final_biaya'       => $value->final_biaya,
                'created_at'        => Carbon::parse($value->created_at)->translatedFormat('l, d F Y'),
                'list_kavling'      => isset($array_rincian[$value->no_booking]) ? $array_rincian[$value->no_booking] : [],
                'file'              => isset($array_file[$value->no_booking]) ? $array_file[$value->no_booking] : [],
            ];
        }
        return view('admin.pesanan_user.prev', ['data' => $array_usulan]);
    }


    public function print_invoice($id)
    {
        $data_booking = DB::table('ta_final_booking')
            ->Join('users', 'users.id', '=', 'ta_final_booking.id_user')
            ->where('ta_final_booking.id_final_booking', '=', $id)
            ->select('ta_final_booking.*', 'users.*')
            ->get()
            ->toArray();

        $array_file = [];
        $rincian_file = DB::table('ta_file_pembayaran')
            ->select('ta_file_pembayaran.*')
            ->get()
            ->toArray();
        foreach ($rincian_file as $key => $pecah1) {
            $array_file[$pecah1->no_booking] = [
                'nama_file_pembayaran'  => $pecah1->nama_file_pembayaran,
                'ctt_pembayaran'        => $pecah1->ctt_pembayaran,
            ];
        }

        $array_rincian = [];
        $rincian_boking = DB::table('ta_booking')
            ->Join('ms_kavling', 'ta_booking.id_kavling', '=', 'ms_kavling.id_kavling')
            ->select('ta_booking.*', 'ms_kavling.*')
            ->get()
            ->toArray();
        foreach ($rincian_boking as $key => $pecah) {
            $array_rincian[$pecah->no_booking][] = [
                'kode_kavling'      => $pecah->kode_kavling,
                'nama_kavling'      => $pecah->nama_kavling,
                'tanggal_booking'   => Carbon::parse($pecah->tanggal_booking)->translatedFormat('l, d F Y'),
                'lama_menginap'     => $pecah->lama_menginap,
                'total_biaya'       => $pecah->total_biaya,
            ];
        }
        $array_usulan = [];
        foreach ($data_booking as $key => $value) {
            $array_usulan[$key] = [
                'id_final_booking'  => $value->id_final_booking,
                'name'              => $value->name,
                'email'             => $value->email,
                'no_telp'           => $value->no_telp,
                'alamat_lengkap'    => $value->alamat_lengkap,
                'no_booking'        => $value->no_booking,
                'total_menginap'    => $value->total_menginap,
                'final_biaya'       => $value->final_biaya,
                'created_at'        => Carbon::parse($value->created_at)->translatedFormat('l, d F Y'),
                'list_kavling'      => isset($array_rincian[$value->no_booking]) ? $array_rincian[$value->no_booking] : [],
                'file'              => isset($array_file[$value->no_booking]) ? $array_file[$value->no_booking] : [],
            ];
        }
        return view('admin.pesanan_user.print', ['data' => $array_usulan]);
    }
}
