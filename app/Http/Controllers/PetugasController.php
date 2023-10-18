<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PetugasController extends Controller
{
    function petugas(){
        $petugas = DB::table('petugas')->get();
        return view('data_petugas',['petugas' => $petugas]);
      }
}
