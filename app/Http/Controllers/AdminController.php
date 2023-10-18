<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    function tambah_petugas(){
        return view('tambah_petugas');
    }
    function proses_tambah_petugas(Request $request) {

        $nama = $request->nama;
        $username = $request->username;
        $password = $request->password;
        $telp = $request->telp;
    
        DB::table('petugas')->insert([
            'nama_petugas' => $nama,
            'username' => $username,
            'password' => $password,
            'telp' => $telp
        ]);
        return redirect('/data_petugas');
    }
}