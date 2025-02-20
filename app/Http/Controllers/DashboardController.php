<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Menghitung total jumlah siswa
        $totalSiswa = Siswa::count();
        
        // Menghitung jumlah siswa laki-laki
        $jumlahLaki = Siswa::where('jenis_kelamin', 'L')->count();
        
        // Menghitung jumlah siswa perempuan
        $jumlahPerempuan = Siswa::where('jenis_kelamin', 'P')->count();
        
        // Menghitung total jumlah kelas
        $totalKelas = Kelas::count();

        $setting = Setting::firstOrCreate([]);
        
        return view('dashboard', compact('totalSiswa', 'jumlahLaki', 'jumlahPerempuan', 'totalKelas','setting'));
    }
}
