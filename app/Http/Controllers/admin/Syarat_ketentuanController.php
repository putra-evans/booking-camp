<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;

class Syarat_ketentuanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('ms_syarat_ketentuan')
                ->orderBy('id_syarat_ketentuan', 'DESC')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('syarat', function ($item) {
                    $syarat = strip_tags($item->syarat_ketentuan);
                    return $syarat;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_syarat_ketentuan  . '" title="Edit data" class="btn btn-icon btn-warning waves-effect waves-light" id="BtnEdit"><i class="fa-solid fa-pencil"></i></button>
                    <button type="button" data-id="' . $item->id_syarat_ketentuan  . '" title="Hapus data" class="btn btn-icon btn-danger waves-effect waves-light" id="BtnHapus"><span class="fa-regular fa-trash-can"></span></button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'syarat'])
                ->make(true);
        }
        return view('admin.syarat_ketentuan.index', [
            // 'kabkota' => $city
        ]);
    }

    public function add_syarat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_syarat_ketentuan'      => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // cek kavling ada atau tidak
        $data_syarat = DB::table('ms_syarat_ketentuan')
            ->first();
        if ($data_syarat == null) {
            DB::table('ms_syarat_ketentuan')->insert([
                'syarat_ketentuan' => $request->input_syarat_ketentuan,
            ]);
            return response()->json('Berhasil Simpan Syarat dan Ketentuan', 200);
        } else {
            return response()->json('Data Sudah Ada', 403);
        }
    }

    public function hapus_syarat(Request $request)
    {
        //find post by ID
        DB::table('ms_syarat_ketentuan')->where('id_syarat_ketentuan', $request->id)->delete();
        return response()->json('Berhasil dihapus', 200);
    }

    public function detail_syarat(Request $request)
    {
        $data_kavling = DB::table('ms_syarat_ketentuan')->where('id_syarat_ketentuan', '=', $request->id)->get();
        return response()->json($data_kavling, 200);
    }

    public function edit_syarat(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_syarat_ketentuan'      => 'required',
            'edit_syarat_ketentuan'      => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        DB::table('ms_syarat_ketentuan')
            ->where('id_syarat_ketentuan', '=', $request->id_syarat_ketentuan)
            ->update([
                'syarat_ketentuan' => $request->edit_syarat_ketentuan
            ]);
        return response()->json('Berhasil edit data', 200);
    }
}
