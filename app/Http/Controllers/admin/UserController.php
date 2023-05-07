<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data_user = DB::table('users')
                ->orderBy('status_akun', 'ASC')
                ->get();

            return Datatables::of($data_user)
                ->addIndexColumn()
                ->addColumn('status_akun', function ($item) {

                    if ($item->status_akun == 1) {
                        $status = '<button type="button" class="btn btn-outline-whatsapp waves-effect btn-xs"> <i class="tf-icons mdi mdi-check-decagram me-1"></i>Aktif</button>';
                    } else {
                        $status = '<button type="button" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs"> <i class="tf-icons mdi mdi-close-circle me-1"></i>Tidak Aktif </button>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" title="Edit data" class="btn btn-icon btn-warning waves-effect waves-light BtnEdit"><i class="fa-solid fa-pencil"></i></button>
                    <button type="button" title="Hapus data" class="btn btn-icon btn-danger waves-effect waves-light" id="BtnHapus"><span class="fa-regular fa-trash-can"></span></button>
                    <button type="button" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>';
                    return $btn;
                })
                ->rawColumns(['action', 'status_akun'])
                ->make(true);
        }
        return view('admin.user.index', [
            // 'kabkota' => $city
        ]);
    }
}
