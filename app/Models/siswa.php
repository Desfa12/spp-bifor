<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; // Nama tabel di database
    protected $fillable = ['id_kelas', 'nama_siswa']; // Kolom yang bisa diisi

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id'); // Relasi ke tabel kelas
    }
}
