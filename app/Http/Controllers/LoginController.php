<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function tampil(){
        return view("login");
    }
    function login(Request $request){

       $dataLogin = $request->only("username", "password"); // buat ambil data input
        if(Auth::attempt($dataLogin)){ // proses login
            return redirect("/home");
        }else{
            return redirect("/login");
        }

    }

    function logout(){
        // Session::flush();
        Auth::logout();

        return redirect('/login');
    }
}