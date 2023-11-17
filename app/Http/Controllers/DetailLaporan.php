<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DetailLaporan extends Controller
{
    function detail($id_pengaduan){
        $title = "Laporan Per Orang";
        $pengaduan = DB::table('pengaduan')->rightJoin('tanggapan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
                ->where('pengaduan.id_pengaduan', $id_pengaduan)
                ->first();
  
                return view('detail', [
                    "title" => $title,
                    "pengaduan" => $pengaduan
                ]);        
    }   

    function detail_petugas($id_pengaduan){
        $title = "Laporan Per Orang";
        $pengaduan = DB::table('pengaduan')->rightJoin('tanggapan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
                ->where('pengaduan.id_pengaduan', $id_pengaduan)
                ->first();
  
                return view('petugas.detail', [
                    "title" => $title,
                    "pengaduan" => $pengaduan
                ]);        
            }
    function detailp($id_pengaduan){
        $title = "Laporan Per Orang";
        $pengaduan = DB::table('pengaduan')
                ->where('id_pengaduan', $id_pengaduan)
                ->first();
  
                return view('petugas/detail', [
                    "title" => $title,
                    "pengaduan" => $pengaduan
                ]);        
    }   
    function edit($id)
    {
        $data = DB::table('pengaduan')->where('id_pengaduan', $id)->first();
        $data = (array) $data;

        return view('update', ['data' => $data]);
    }

    function update_pengaduan(Request $request, $id)
    {
        $namaFoto = "";
        if ($request->hasFile('foto')) {
             $namaFoto = time() . $request->foto->getClientOriginalName();
             $request->foto->move('img', $namaFoto);
    }
        $request->validate([
            'isi_laporan' => 'required'
        ]);

        $isi_pengaduan = $request->isi_laporan;

        DB::table('pengaduan')->where('id_pengaduan', $id)
            ->update([
                'isi_laporan' => $isi_pengaduan,
                'foto' => $namaFoto,
            ]);

            return redirect('hasil');
    }

    public function generateReport($id)
    {
        // Fetch data from the database based on $nik
        $pengaduan = DB::table('pengaduan')
        ->rightJoin('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
        ->where('pengaduan.id_pengaduan',$id)
            ->get();
    

        if (!$pengaduan) {
            // Handle the case where the report data doesn't exist
            abort(404);
        }

        // Return the report view with data
        return view('petugas.report', ['pengaduan' => $pengaduan]);
    }
}

