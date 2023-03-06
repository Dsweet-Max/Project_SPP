<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey='id_siswa';
    protected $table = "siswa";
    protected $fillable = ['id_siswa', 'nis', 'name', 'id_kelas', 'alamat', 'no_telp', 'id_spp'];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }
}
