<?php

use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\DetailLaporan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\LoginPetugasController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\AdminController;


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

Route::get('/login', [LoginController::class, 'tampil'])->name("login");
Route::post('/login', [LoginController::class, 'login']);
Route::middleware(['auth'])->group(function () {
    
    route::get('/hasil', [PengaduanController::class, 'index']);
    
    route::get('/home', [MasyarakatController::class, 'home' ]);

    route::get('/pengaduan', [PengaduanController::class, 'pengaduan']);
    route::post('/pengaduan', [PengaduanController::class, 'proses_tambah_pengaduan']);
    route::get('/Petugas/Detail/{id_pengaduan}', [DetailLaporan::class, 'detail_petugas']);
    route::post('/tambah_petugas', 'App\Http\Controllers\AdminController@proses_tambah_petugas');
    route::get('/tambah_petugas','App\Http\Controllers\AdminController@tambah_petugas');

    Route::get('/detail', [DetailLaporan::class, 'detail']);

    Route::get('/hasil/update_pengaduan/{id}', [DetailLaporan::class, 'edit']);
    Route::put('/hasil/update_pengaduan/{id}', [DetailLaporan::class, 'update_pengaduan'])->name('updatepengaudan');
});

Route::get('petugas/login', [LoginPetugasController::class, 'index']);
Route::post('petugas/login', [LoginPetugasController::class, 'login']);

Route::middleware(['cekPetugas'])->group(function () {
    Route::get('/petugas/home', [PetugasController::class, "index"]);

    Route::get('/petugas/tambah_petugas', [AdminController::class, 'tambah_petugas']);

    Route::get('/petugas/data_petugas', 'App\Http\Controllers\PetugasController@petugas');

    Route::get('/petugas/data_masyarakat', [PetugasController::class, 'masyarakat']);

    route::get('/petugas/hasil', [PengaduanController::class, 'index_petugas']);

    Route::get('/Petugas/DetailLaporan/detail/{id_pengaduan}', [DetailLaporan::class, "detail_petugas"]);

    Route::get('petugas/logout', [LoginPetugasController::class, "logout"]);

    Route::get('/Petugas/DetailLaporan/Tanggapan/{id}', [TanggapanController::class, "tampil_tanggapan"]);

    Route::post('/Petugas/DetailLaporan/Tanggapan/{id}', [TanggapanController::class, "proses_tambah_tanggapan"]);

    // Route to handle 'Terima' action for all "pengaduan" rows with status '0'
Route::get('/Petugas/DetailLaporan/terima/{id_pengaduan}', [TanggapanController::class, 'terima']);

// Route to handle 'Tolak' action for all "pengaduan" rows with status '0'
Route::get('/Petugas/DetailLaporan/tolak/{id_pengaduan}', [TanggapanController::class, 'tolak']);

// Route to handle 'Selesai' action for all "pengaduan" rows with status 'proses'
Route::get('/Petugas/DetailLaporan/selesai/{id_pengaduan}', [TanggapanController::class, 'selesai']);
});

Route::get('/detail', [DetailLaporan::class, 'detailp']);
Route::get('/DetailLaporan/detailp/{id_pengaduan}', [DetailLaporan::class, "detailp"]);


Route::post('/register', [AuthController::class, 'store']);

Route::delete('/PengaduanController/hapus/{id_pengaduan}', [PengaduanController::class,'hapus']);  
Route::delete('/PengaduanController/hapusm/{id_pengaduan}', [PengaduanController::class,'hapusm']);  

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/Petugas/hasil/detail_pengaduan/generate-report/{id}', [DetailLaporan::class, 'generateReport']);