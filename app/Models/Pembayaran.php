<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'Pembayaran';
    protected $fillable = ['id_pembayaran','id_petugas', 'username', 'password', 'nama_petugas', 'level'];
}