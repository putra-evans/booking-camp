<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;


class Ms_cara_bookingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('ms_cara_booking')
                ->orderBy('id_cara_booking', 'DESC')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('cara_booking', function ($item) {
                    $data_tertib = strip_tags($item->cara_booking);
                    return $data_tertib;
                })
                ->addColumn('action', function ($item) {
                    $btn = '<button type="button" data-id="' . $item->id_cara_booking   . '" title="Edit data" class="btn btn-icon btn-warning waves-effect waves-light" id="BtnEdit"><i class="fa-solid fa-pencil"></i></button>
                    <button type="button" data-id="' . $item->id_cara_booking   . '" title="Hapus data" class="btn btn-icon btn-danger waves-effect waves-light" id="BtnHapus"><span class="fa-regular fa-trash-can"></span></button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'cara_booking'])
                ->make(true);
        }
        return view('admin.cara_booking.index', [
            // 'kabkota' => $city
        ]);
    }

    public function add_cara(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_cara'      => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // cek Cara Booking ada atau tidak
        $data_syarat = DB::table('ms_cara_booking')
            ->first();
        if ($data_syarat == null) {
            DB::table('ms_cara_booking')->insert([
                'cara_booking' => $request->input_cara,
            ]);
            return response()->json('Berhasil Simpan Cara Booking', 200);
        } else {
            return response()->json('Data Sudah Ada', 403);
        }
    }

    public function hapus_cara(Request $request)
    {
        //find post by ID
        DB::table('ms_cara_booking')->where('id_cara_booking', $request->id)->delete();
        return response()->json('Berhasil dihapus', 200);
    }


    public function detail_cara(Request $request)
    {
        $data_kavling = DB::table('ms_cara_booking')->where('id_cara_booking', '=', $request->id)->get();
        return response()->json($data_kavling, 200);
    }

    public function edit_cara(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_cara'               => 'required',
            'edit_input_cara'      => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        DB::table('ms_cara_booking')
            ->where('id_cara_booking', '=', $request->id_cara)
            ->update([
                'cara_booking' => $request->edit_input_cara
            ]);
        return response()->json('Berhasil edit data', 200);
    }
}
