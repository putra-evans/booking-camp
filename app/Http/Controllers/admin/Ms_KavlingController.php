<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;

class Ms_KavlingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data_user = DB::table('ms_kavling')
                ->orderBy('id_kavling', 'DESC')
                ->get();

            return Datatables::of($data_user)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_kavling . '" title="Edit data" class="btn btn-icon btn-warning waves-effect waves-light" id="BtnEdit"><i class="fa-solid fa-pencil"></i></button>
                    <button type="button" data-id="' . $item->id_kavling . '" title="Hapus data" class="btn btn-icon btn-danger waves-effect waves-light" id="BtnHapus"><span class="fa-regular fa-trash-can"></span></button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.kavling.index', [
            // 'kabkota' => $city
        ]);
    }

    public function add_kavling(Request $request)
    {
        $kode = strtoupper($request->kode_kavling);
        $kode_kavling = str_replace(' ', '', $kode);

        $validator = Validator::make($request->all(), [
            'kode_kavling'      => 'required',
            'nama_kavling'      => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // cek kavling ada atau tidak
        $data_kavling = DB::table('ms_kavling')
            ->where('kode_kavling', '=', $kode_kavling)
            ->first();

        if ($data_kavling == null) {
            DB::table('ms_kavling')->insert([
                'kode_kavling' => $kode_kavling,
                'nama_kavling' => $request->nama_kavling,
                'status_kavling' => 1,
            ]);
            return response()->json('Berhasil Simpan Kavling', 200);
        } else {
            return response()->json('Data Sudah Ada', 403);
        }
    }

    public function hapus_kavling(Request $request)
    {
        //find post by ID
        $data_kavling = DB::table('ta_booking')
            ->where('id_kavling', $request->id)
            ->first();
        if ($data_kavling == null) {
            DB::table('ms_kavling')->where('id_kavling', $request->id)->delete();
            return response()->json('Berhasil dihapus', 200);
        } else {
            return response()->json('Gagal, karena kavling ini sudah pernah dibooking', 403);
        }
    }

    public function detail_kavling(Request $request)
    {
        $data_kavling = DB::table('ms_kavling')->where('id_kavling', '=', $request->id)->get();
        return response()->json($data_kavling, 200);
    }


    public function edit_kavling(Request $request)
    {
        $kode = strtoupper($request->edit_kode_kavling);
        $kode_kavling = str_replace(' ', '', $kode);

        $validator = Validator::make($request->all(), [
            'edit_kode_kavling'      => 'required',
            'edit_nama_kavling'      => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        DB::table('ms_kavling')
            ->where('id_kavling', '=', $request->edit_id_kavling)
            ->update([
                'kode_kavling' => $kode_kavling,
                'nama_kavling' => $request->edit_nama_kavling,
                'status_kavling' => 1,
            ]);
        return response()->json('Berhasil Simpan Kavling', 200);
        // // cek kavling ada atau tidak
        // $data_kavling = DB::table('ms_kavling')
        //     ->where('kode_kavling', '=', $kode_kavling)
        //     ->first();

        // if ($data_kavling == null) {

        // } else {
        //     return response()->json('Data Sudah Ada', 403);
        // }
    }
}
