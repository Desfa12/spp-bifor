<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasiswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; // Nama tabel di database
    protected $fillable = ['nis', 'nisn', 'nama_siswa', 'id_kelas', 'jenis_kelamin', 'tgl_lahir', 'no_telp'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas'); // Sesuaikan dengan foreign key di tabel datasiswa
    }

}
