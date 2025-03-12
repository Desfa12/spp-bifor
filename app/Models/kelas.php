<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['tingkat', 'jurusan', 'angkatan', 'aktif'];

    public function siswa()
    {
        return $this->hasMany(Datasiswa::class, 'id_kelas', 'id');
    }
}
