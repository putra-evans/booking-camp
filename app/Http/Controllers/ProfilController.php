<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index()
    {
        $id_user = Auth::user()->id;
        $data_user = DB::table('users')->where('id', '=', $id_user)->get();
        return view('profil.index', [
            'layer_one' => 'Data User',
            'data' => $data_user
        ]);
    }


    public function form_add()
    {
        $id_user = Auth::user()->id;
        $data_user = DB::table('users')->where('id', '=', $id_user)->get();
        return view('profil.edit', [
            'layer_one' => 'Data User',
            'data' => $data_user
        ]);
    }
    public function store_foto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload_foto'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tujuan_upload = 'foto_user';
        $file = $request->file('upload_foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama_file);


        $data_user = DB::table('users')->where('id', '=', $request->id_user)->first();
        if ($data_user->foto_user != null) {
            $location = public_path('foto_user/' . $data_user->foto_user);
            unlink($location);
        }

        DB::table('users')
            ->where('id', $request->id_user)
            ->update([
                'foto_user' => $nama_file
            ]);

        return response()->json('Berhasil melakukan update foto profil', 200);
    }

    public function store_ktp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload_foto_ktp'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tujuan_upload = 'foto_ktp';
        $file = $request->file('upload_foto_ktp');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama_file);


        $data_user = DB::table('users')->where('id', '=', $request->id_user)->first();
        if ($data_user->foto_ktp != null) {
            $location = public_path('foto_ktp/' . $data_user->foto_ktp);
            unlink($location);
        }

        DB::table('users')
            ->where('id', $request->id_user)
            ->update([
                'foto_ktp' => $nama_file
            ]);

        return response()->json('Berhasil melakukan update foto ktp', 200);
    }


    public function store_edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_usernya'        => 'required',
            'nama_lengkap'      => 'required',
            'nama_panggilan'    => 'required',
            'no_telp'           => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'alamat_lengkap'    => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        DB::table('users')
            ->where('id', $request->id_usernya)
            ->update([
                'name'              => $request->nama_lengkap,
                'nama_panggilan'    => $request->nama_panggilan,
                'no_telp'           => $request->no_telp,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'tempat_lahir'      => $request->tempat_lahir,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'alamat_lengkap'    => $request->alamat_lengkap,
                'status_akun'       => 1,
            ]);
        return response()->json('Berhasil melakukan update data', 200);
    }
}
