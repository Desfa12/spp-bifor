<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{


    protected $table = 'transaksi'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'siswa_id',
        'bulan',
        'jumlah_tagihan',
        'telah_dibayar',
        'sisa',
        'keterangan',
    ];

    // Relasi dengan tabel Siswa (misalnya)
    // Model Transaksi.php
    // Di model Transaksi
    public function Datasiswa()
    {
        return $this->belongsTo(Datasiswa::class, 'id_siswa'); // Pastikan nama kolom foreign key sesuai
    }
}
