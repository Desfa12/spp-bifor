<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = ['nama_satuan', 'no_lembaga', 'no_tlp', 'alamat', 'kota', 'kepala_sekolah', 'nip_kepsek', 'bendahara', 'nip_bendahara', 'logo','created_at','updated_at'];
}
