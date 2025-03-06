<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use App\Models\Setting;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KwitansiExport;
use PDF;

class TransaksiController extends Controller
{
    // Menampilkan semua data siswa
    public function index(Request $request)
    {
        $katakunci = $request->input('katakunci');
        $jenisKelamin = $request->input('jenis_kelamin'); // Ambil filter jenis kelamin dari request

        $query = Datasiswa::with('kelas');

        if ($katakunci) {
            $query->where(function ($q) use ($katakunci) {
                $q->where('nama_siswa', 'like', "%$katakunci%")
                    ->orWhere('nis', 'like', "%$katakunci%")
                    ->orWhere('nisn', 'like', "%$katakunci%");
            });
        }

        if ($jenisKelamin) {
            $query->where('jenis_kelamin', $jenisKelamin);
        }

        $datasiswa = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('transaksi.index', compact('datasiswa', 'katakunci', 'jenisKelamin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id_siswa' => 'required|exists:datasiswa,id', // Pastikan id_siswa ada di tabel datasiswa
            'id_siswa' => 'required|integer',
            'tipe' => 'required|string',
            'bulan' => 'required|string',
            'tagihan' => 'required|min:0',
            'bayar' => 'required|min:0',
            'sisa' => 'required|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // Hitung sisa pembayaran
        // $sisa = $request->tagihan - $request->bayar;
        $request->merge([
            'tagihan' => preg_replace('/\D/', '', $request->tagihan),
            'bayar' => preg_replace('/\D/', '', $request->bayar),
            'sisa' => preg_replace('/\D/', '', $request->sisa),
        ]);

        // Simpan ke database
        $transaksi = Transaksi::create([
            'id_siswa' => $request->id_siswa,
            'tipe' => $request->tipe,
            'bulan' => $request->bulan,
            'tagihan' => $request->tagihan,
            'bayar' => $request->bayar,
            'sisa' => $request->sisa,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->has('cetak')) {
            return redirect()->route('transaksi.export', $transaksi->id);
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function exportExcel($id)
    {
        return Excel::download(new KwitansiExport($id), 'kwitansi.xlsx');
    }

    // public function exportPdf($id)
    // {


    //     $pdf = PDF::loadView('rekap.rekap_data_pdf', compact('transaksi', 'totalSisa'));
    //     return $pdf->stream('rekap_data.pdf');
    // }
    public function exportPdf($id)
    {
        // Ambil transaksi berdasarkan ID dengan relasi siswa dan kelas
        $transaksi = Transaksi::with('siswa.kelas')->findOrFail($id);
        $setting = Setting::firstOrCreate([]);
    
        // Generate PDF dalam mode landscape
        $pdf = PDF::loadView('transaksi.kwitansi_pdf', compact('transaksi', 'setting'))
                  ->setPaper('a4', 'landscape'); // Ubah ke landscape
    
        // Menampilkan PDF di browser sebelum diunduh
        return $pdf->stream('transaksi.kwitansi_pdf.pdf');
    }
    

}
