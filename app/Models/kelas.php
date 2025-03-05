<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['tingkat', 'jurusan', 'angkatan', 'aktif', 'spp', 'dsp', 'pts1', 'pas1', 'pts2', 'pas2', 'daftar_ulang', 'lainnya'];

    public function siswa()
    {
        return $this->hasMany(Datasiswa::class, 'kelas_id', 'id');
    }
}
