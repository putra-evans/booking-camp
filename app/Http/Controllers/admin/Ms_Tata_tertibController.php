<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;

class Ms_Tata_tertibController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('ms_tata_tertib')
                ->orderBy('id_tata_tertib', 'DESC')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tata_tertib', function ($item) {
                    $data_tertib = strip_tags($item->tata_tertib);
                    return $data_tertib;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_tata_tertib   . '" title="Edit data" class="btn btn-icon btn-warning waves-effect waves-light" id="BtnEdit"><i class="fa-solid fa-pencil"></i></button>
                    <button type="button" data-id="' . $item->id_tata_tertib   . '" title="Hapus data" class="btn btn-icon btn-danger waves-effect waves-light" id="BtnHapus"><span class="fa-regular fa-trash-can"></span></button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'tata_tertib'])
                ->make(true);
        }
        return view('admin.tata_tertib.index', [
            // 'kabkota' => $city
        ]);
    }

    public function add_tertib(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_tertib'      => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // cek tata tertib ada atau tidak
        $data_syarat = DB::table('ms_tata_tertib')
            ->first();
        if ($data_syarat == null) {
            DB::table('ms_tata_tertib')->insert([
                'tata_tertib' => $request->input_tertib,
            ]);
            return response()->json('Berhasil Simpan Tata Tertib', 200);
        } else {
            return response()->json('Data Sudah Ada', 403);
        }
    }

    public function hapus_tertib(Request $request)
    {
        //find post by ID
        DB::table('ms_tata_tertib')->where('id_tata_tertib', $request->id)->delete();
        return response()->json('Berhasil dihapus', 200);
    }


    public function detail_tertib(Request $request)
    {
        $data_kavling = DB::table('ms_tata_tertib')->where('id_tata_tertib', '=', $request->id)->get();
        return response()->json($data_kavling, 200);
    }

    public function edit_tertib(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_tata_tertib'      => 'required',
            'edit_tata_tertib'      => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        DB::table('ms_tata_tertib')
            ->where('id_tata_tertib', '=', $request->id_tata_tertib)
            ->update([
                'tata_tertib' => $request->edit_tata_tertib
            ]);
        return response()->json('Berhasil edit data', 200);
    }
}
