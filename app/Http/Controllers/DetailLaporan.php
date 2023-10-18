<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DetailLaporan extends Controller
{
    function hapus($id_pengaduan){
        DB::table('pengaduan')->where('id_pengaduan', '=' ,$id_pengaduan)->delete();
        return redirect('/hasil');
    }
    
    function detail($id_pengaduan){
        $title = "Laporan Per Orang";
        $pengaduan = DB::table('pengaduan')
                ->where('id_pengaduan', $id_pengaduan)
                ->first();
  
                return view('detail', [
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
}

