<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class PetugasController extends Controller
{
    function petugas(){
        $petugas = DB::table('petugas')->get();
        return view('data_petugas',['petugas' => $petugas]);
      }
      public function index(){
        return view('petugas.home');
      }

      public function create(): View
      {
          return view('petugas.register');
      }
      public function store(Request $request)
      {
  
      $user = DB::table('petugas')->insert([
          'nama_petugas'=> $request->nama_petugas,
          'username' => $request->username,-
          'password' => Hash::make($request->password),
          'telp' => $request->telp,
  
          
      ]);
      return redirect('/home');
      
  }
}
