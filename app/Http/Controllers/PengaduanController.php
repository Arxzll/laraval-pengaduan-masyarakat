<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PengaduanController extends Controller
{
    function index(){

    $judul = "Selamat Datang";
    $pengaduan = DB::table('pengaduan')->where('nik', Auth::user()->nik)->get();
 

    return view('hasil', ['judul' => $judul, 'pengaduan' => $pengaduan]);
   }
   function index_petugas(){

    $judul = "Selamat Datang";
    $pengaduan = DB::table('pengaduan')->get();
 

    return view('/petugas/hasil', ['judul' => $judul, 'pengaduan' => $pengaduan]);
   }


function tampil_pengaduan(){
    return view('isi_pengaduan');
  }

  function proses_tambah_pengaduan(Request $request) {
    // var_dump($request->foto);
    // die();
    $request->validate([
        'isi_laporan' => 'required'
    ]);

    $namaFoto = "";
    if ($request->hasFile('foto')) {
         $namaFoto = time() . $request->foto->getClientOriginalName();
         $request->foto->move('img', $namaFoto);
}
    $isi_pengaduan = $request->isi_laporan;

    DB::table('pengaduan')->insert([
        'tgl_pengaduan' => date('Y-m-d'),
        'nik' => Auth::user()->nik,
        'isi_laporan' => $isi_pengaduan,
        'foto' => $namaFoto,
        'status' => '0',
    ]);
    return redirect('/hasil');
}

    function pengaduan(){
      return view('pengaduan');
    }
    function hapus($id_pengaduan){
        DB::table('pengaduan')->where('id_pengaduan', '=' ,$id_pengaduan)->delete();
        return redirect('/petugas/hasil');
    }


    function hapusm($id_pengaduan){
        DB::table('pengaduan')->where('id_pengaduan', '=' ,$id_pengaduan)->delete();
        return redirect('/hasil');
    }
}