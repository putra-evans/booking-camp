<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Ms_galeriController extends Controller
{
    public function index()
    {
        $data = DB::table('ms_galeri')
            ->orderBy('id_galeri', 'DESC')
            ->get();
        return view('admin.galeri.index', [
            'data' => $data
        ]);
    }

    public function add_galeri(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload_galeri'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul_galeri'          => 'required',
            'keterangan_galeri'     => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tujuan_upload = 'foto_galeri';
        $file = $request->file('upload_galeri');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama_file);

        DB::table('ms_galeri')->insert([
            'file_galeri'       => $nama_file,
            'judul_galeri'      => $request->judul_galeri,
            'tentang_galeri'    => $request->keterangan_galeri,
        ]);
        return response()->json('Berhasil melakukan upload', 200);
    }

    public function hapus_galeri(Request $request)
    {
        $data_file = DB::table('ms_galeri')
            ->where('id_galeri', '=', $request->id)
            ->first();
        $location = public_path('foto_galeri/' . $data_file->file_galeri);
        unlink($location);
        DB::table('ms_galeri')->where('id_galeri', $request->id)->delete();
        return response()->json('Berhasil dihapus', 200);
    }
}
