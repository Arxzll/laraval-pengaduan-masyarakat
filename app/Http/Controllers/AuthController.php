<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
class AuthController extends Controller
{
    public function create(): View
    {
        return view('register');
    }
    public function store(Request $request)
    {

    $user = DB::table('masyarakat')->insert([
        'nik' => $request->nik,
        'nama'=> $request->nama,
        'username' => $request->username,-
        'password' => Hash::make($request->password),
        'telp' => $request->telp,

        
    ]);
    return redirect('/home');
    
    
}

}