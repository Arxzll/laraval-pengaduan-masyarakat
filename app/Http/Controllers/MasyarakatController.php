<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class MasyarakatController extends Controller
{
    
   function home(){
    // $user = Auth::user();
 
    // // Retrieve the currently authenticated user's ID...
    // $id = Auth::id();

    // return $user;
    return view('/home');
   }
   function masyarakat(){
    $masyarakat = DB::table('masyarakat')->get();
    return view('data_masyarakat',['masyarakat' => $masyarakat]);
  }
  function register(){
    return view('register');
  }
  function proses_tambah_masyarakat(Request $request) {


    $nik = $request->nik;
    $nama = $request->nama;
    $username = $request->username;
    $password = $request->password;
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
