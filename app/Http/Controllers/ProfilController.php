<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
}
