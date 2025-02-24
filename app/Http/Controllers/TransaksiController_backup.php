<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiControllerbackup extends Controller
{
    public function index()
    {
        $transactions = Transaksi::with('siswa.kelas')->get();
        $students = Datasiswa::with('kelas')->get();
        // return $students;    
        return view('transaksi.index', compact('transactions', 'students'));
    }

    // public function create()
    // {
    //     $students = Datasiswa::all();
    //     return view('transaksi.create', compact('students'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            // 'id_siswa' => 'required|exists:datasiswa,id', // Pastikan id_siswa ada di tabel datasiswa
            'id_siswa' => 'required|integer',
            'tipe' => 'required|string',
            'bulan' => 'required|string',
            'tagihan' => 'required|numeric|min:0',
            'bayar' => 'required|numeric|min:0',
            'sisa' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // Hitung sisa pembayaran
        $sisa = $request->tagihan - $request->bayar;

        // Simpan ke database
        Transaksi::create([
            'id_siswa' => $request->id_siswa,
            'tipe' => $request->tipe,
            'bulan' => $request->bulan,
            'tagihan' => $request->tagihan,
            'bayar' => $request->bayar,
            'sisa' => $sisa,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }
}
