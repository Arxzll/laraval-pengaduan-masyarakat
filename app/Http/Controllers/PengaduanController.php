<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    function index(){

    $judul = "Selamat Datang";
    $pengaduan = DB::table('pengaduan')->get();
 

    return view('hasil', ['judul' => $judul, 'pengaduan' => $pengaduan]);
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
        'nik' => '1',
        'isi_laporan' => $isi_pengaduan,
        'foto' => $namaFoto,
        'status' => '0',
    ]);
    return redirect('/hasil');
}

    function pengaduan(){
      return view('pengaduan');
    }

}