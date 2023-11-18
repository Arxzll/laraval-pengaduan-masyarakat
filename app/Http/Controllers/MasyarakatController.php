<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class MasyarakatController extends Controller
{
    
   function home(){

    // return Auth::user();
    return view('/home');
   }
  
  function register(){
    return view('register');
  }
  function proses_tambah_masyarakat(Request $request) {


    $nik = $request->nik;
    $nama = $request->nama;
    $username = $request->username;
    $password = hash::make($request->password);
    $telp = $request->telp;

    DB::table('masyarakat')->insert([
        'nik' => $nik,
        'nama' => $nama,
        'username' => $username,
        'password' => $password,
        'telp' => $telp
    ]);
    return redirect('/data_masyarakat');
}
}
