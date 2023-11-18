<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\View\View;
class PetugasController extends Controller
{
    function petugas(){
        $petugas = DB::table('petugas')->get();
        return view('petugas/data_petugas',['petugas' => $petugas]);
      }
      public function index(){
        return view('petugas.home');
      }

      function masyarakat(){
        $masyarakat = DB::table('masyarakat')->get();
        return view('petugas/data_masyarakat',['masyarakat' => $masyarakat]);
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
