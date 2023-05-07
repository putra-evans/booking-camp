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
                ->orderBy('created_at', 'DESC')
                ->get();

            return Datatables::of($data_user)
                ->addIndexColumn()
                ->addColumn('status_akun', function ($item) {

                    if ($item->status_akun == 1) {
                        $status = '<button type="button" data-id="' . $item->id . '" class="btn btn-outline-whatsapp waves-effect btn-xs btnAktif"> <i class="tf-icons mdi mdi-check-decagram me-1"></i>Aktif</button>';
                    } else {
                        $status = '<button type="button" data-id="' . $item->id . '" class="btn rounded-pill btn-outline-youtube waves-effect btn-xs  btnNonAktif"> <i class="tf-icons mdi mdi-close-circle me-1"></i>Tidak Aktif </button>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id . '" title="Detail data" class="btn btn-icon btn-primary waves-effect waves-light" id="BtnDetail"><span class="fa-solid fa-circle-info"></span></button>
                    <button type="button" data-id="' . $item->id . '" title="Hapus data" class="btn btn-icon btn-danger waves-effect waves-light" id="BtnHapus"><span class="fa-regular fa-trash-can"></span></button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'status_akun'])
                ->make(true);
            // <button type="button" title="Edit data" class="btn btn-icon btn-warning waves-effect waves-light BtnEdit"><i class="fa-solid fa-pencil"></i></button>
        }
        return view('admin.user.index', [
            // 'kabkota' => $city
        ]);
    }

    public function get_user(Request $request)
    {
        $data_user = DB::table('users')
            ->where('id', $request->id)
            ->get();
        return response()->json($data_user, 200);
    }

    public function destroy(Request $request)
    {
        //find post by ID
        $data_user = DB::table('users')
            ->where('id', $request->id)
            ->first();

        if ($data_user->foto_ktp != null) {
            $location_ktp = public_path('foto_ktp/' . $data_user->foto_ktp);
            unlink($location_ktp);
        }

        if ($data_user->foto_user != null) {
            $location_profil = public_path('foto_user/' . $data_user->foto_user);
            unlink($location_profil);
        }
        DB::table('users')->where('id', $data_user->id)->delete();
        return response()->json('Berhasil dihapus', 200);
    }
    public function aktif_akun(Request $request)
    {
        $data_user = DB::table('users')
            ->where('id', $request->id)
            ->first();

        DB::table('users')
            ->where('id', $data_user->id)
            ->update([
                'status_akun' => 1
            ]);
        return response()->json('Berhasil diaktifkan', 200);
    }
    public function nonaktif_akun(Request $request)
    {
        $data_user = DB::table('users')
            ->where('id', $request->id)
            ->first();

        DB::table('users')
            ->where('id', $data_user->id)
            ->update([
                'status_akun' => 0
            ]);
        return response()->json('Berhasil dinonaktifkan', 200);
    }
}
