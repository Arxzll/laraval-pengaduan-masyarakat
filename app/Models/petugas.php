<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class petugas extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
    "id",
    "nama_petugas",
    "username",
    "password",
    "telp",
    "level"
];

    protected $table = "petugas";
}
