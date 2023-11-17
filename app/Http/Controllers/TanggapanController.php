<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{

    function tampil_tanggapan($id){
        $data = DB::table('pengaduan')->where('id_pengaduan', $id)->first();
        $data = (array) $data;

        return view('petugas.tanggapan', ['data' => $data]);
    }

    function proses_tambah_tanggapan(Request $request, $id){

        $request->validate([
            'tanggapan' => 'required'
        ]);

        $tanggapan = $request->tanggapan;

        $id_petugas = Auth::guard('petugas')->user()->id;

        DB::table('tanggapan')->rightJoin('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')->where('id_pengaduan', $id)->insert([
            'id_pengaduan' => $id,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $tanggapan,
            'id_petugas' => $id_petugas,    
        ]);
        return redirect('/petugas/hasil');
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

    public function terima($id) {
        // Find all "pengaduan" rows with status $id and update their status to 'proses'
        DB  ::table('pengaduan')->where('id_pengaduan', $id)->update(['status' => 'proses']);

        // Redirect back or to a different route
        return redirect('/petugas/hasil');
    }

    public function tolak($id) {
        // Find all "pengaduan" rows with id_pengaduan $id and update their id_pengaduan to 'rejected' or any appropriate id_pengaduan
        DB::table('pengaduan')->where('id_pengaduan', $id)->update(['status' => 'ditolak']);

        // Redirect back or to a different route
        return redirect('/petugas/hasil');
    }

    public function selesai($id) {
        // Find all "pengaduan" rows with id_pengaduan 'proses' and update their id_pengaduan to 'selesai'
        DB::table('pengaduan')->where('id_pengaduan', $id)->update(['status' => 'selesai']);

        // Redirect back or to a different route
        return redirect('/petugas/hasil');
    }
}
