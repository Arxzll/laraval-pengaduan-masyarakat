<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginPetugasController extends Controller
{
    public function index(){
        // return hash::make('123');
        return view('Petugas.login_petugas');
    }

    public function login(Request $request){
        $data = $request->only('username', 'password');
        if(Auth::guard('petugas')->attempt($data)){
            return view ('petugas.home');
        }else{
            return redirect("petugas/login");
        }
    }

    public function logout(){
        Auth::guard('petugas')->logout();

        return redirect('/petugas/login');
    }
}