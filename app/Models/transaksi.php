<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $table = 'transaksi'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'id_siswa',
        'tipe',
        'bulan',
        'tagihan',
        'bayar',
        'sisa',
        'keterangan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Datasiswa::class, 'id_siswa', 'id');
    }
}
