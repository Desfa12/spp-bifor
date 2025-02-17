<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasiswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; // Nama tabel di database
    protected $fillable = ['nis', 'nisn', 'nama_siswa', 'kelas', 'jurusan', 'jenis_kelamin', 'tgl_lahir', 'no_telp'];

    // Di model Datasiswa
    // public function transaksi()
    // {
    //     return $this->hasMany(Transaksi::class);
    // }
}
