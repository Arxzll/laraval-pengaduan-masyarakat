<?php

use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\DetailLaporan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginPetugasController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/hasil', function () {
    return view('hasil');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/register', function () {
    return view('register');
});
route::get('/hasil', [PengaduanController::class, 'index']);

//route untuk menampilkan halaman home
Route::get('/login', [LoginController::class, 'tampil'])->name("login");
    Route::post('/login', [LoginController::class, 'login']);
    Route::middleware(['auth'])->group(function () {
    

    route::get('/home', [MasyarakatController::class, 'home' ]);

    Route::get('/data_petugas', 'App\Http\Controllers\PetugasController@petugas');

    Route::get('/data_masyarakat', [MasyarakatController::class, 'masyarakat']);

    route::get('/pengaduan', [PengaduanController::class, 'pengaduan']);
    route::post('/pengaduan', [PengaduanController::class, 'proses_tambah_pengaduan']);

    route::post('/tambah_petugas', 'App\Http\Controllers\AdminController@proses_tambah_petugas');
    route::get('/tambah_petugas','App\Http\Controllers\AdminController@tambah_petugas');

    Route::get('/detail', [DetailLaporan::class, 'detail']);
    Route::get('/DetailLaporan/detail/{id_pengaduan}', [DetailLaporan::class, "detail"]);

    Route::get('/hasil/update_pengaduan/{id}', [DetailLaporan::class, 'edit']);
    Route::put('/hasil/update_pengaduan/{id}', [DetailLaporan::class, 'update_pengaduan'])->name('updatepengaudan');
});
Route::get('petugas/login', [LoginPetugasController::class, 'index']);
Route::post('petugas/login', [LoginPetugasController::class, 'login']);

Route::middleware(['cekPetugas'])->group(function () {
    Route::get('/petugas/home', [PetugasController::class, "index"]);

  
    Route::get('petugas/logout', [LoginPetugasController::class, "logout"]);
});

//route untuk membuat aduan
// route::get('/pengaduan', [PengaduanController::class, 'pengaduan']);


//route untuk menampilkan data masyarakat
// Route::get('/data_masyarakat', [MasyarakatController::class, 'masyarakat']);

//route untuk menampilkan data petugas
// Route::get('/data_petugas', 'App\Http\Controllers\PetugasController@petugas');

//route untuk register masyarakat dan prosesnya
Route::post('/register', [AuthController::class, 'store']);

//route untuk menambahkan petugas dan prosesnya
// route::post('/tambah_petugas', 'App\Http\Controllers\AdminController@proses_tambah_petugas');
// route::get('/tambah_petugas','App\Http\Controllers\AdminController@tambah_petugas');

//route untuk menghapus aduan
Route::delete('/DetailLaporan/hapus/{id_pengaduan}', 'App\Http\Controllers\DetailLaporan@hapus' );  

// Route::get('/detail', [DetailLaporan::class, 'detail']);
// Route::get('/DetailLaporan/detail/{id_pengaduan}', [DetailLaporan::class, "detail"]);

// Route::get('/hasil/update_pengaduan/{id}', [DetailLaporan::class, 'edit']);
// Route::put('/hasil/update_pengaduan/{id}', [DetailLaporan::class, 'update_pengaduan'])->name('updatepengaudan');



Route::get('/logout', [LoginController::class, 'logout']);


// route::get('/about', function(){
// echo "Ini Halaman About"
// });