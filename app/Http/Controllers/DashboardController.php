<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total jumlah siswa
        $totalSiswa = Datasiswa::count();
        
        // Menghitung jumlah siswa laki-laki
        $jumlahLaki = Datasiswa::where('jenis_kelamin', 'L')->count();
        
        // Menghitung jumlah siswa perempuan
        $jumlahPerempuan = Datasiswa::where('jenis_kelamin', 'P')->count();
        
        // Menghitung total jumlah kelas
        $totalKelas = Kelas::count();

        $setting = Setting::firstOrCreate([]);
        
        return view('dashboard', compact('totalSiswa', 'jumlahLaki', 'jumlahPerempuan', 'totalKelas','setting'));
    }
}
