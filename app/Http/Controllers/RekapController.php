<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with('siswa.kelas');

        // Filter berdasarkan kata kunci (nama siswa, NIS, NISN)
        if ($request->filled('katakunci')) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('nama_siswa', 'like', '%' . $request->katakunci . '%')
                    ->orWhere('nis', 'like', '%' . $request->katakunci . '%')
                    ->orWhere('nisn', 'like', '%' . $request->katakunci . '%');
            });
        }

        // Filter berdasarkan tipe pembayaran (SPP, DSP, Lainnya)
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('bulan', $request->tanggal);
        }

        $transaksi = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('rekap.index', compact('transaksi'));
    }

    public function exportPdf(Request $request)
    {
        $query = Transaksi::with('siswa.kelas');

        if ($request->filled('katakunci')) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('nama_siswa', 'like', '%' . $request->katakunci . '%')
                    ->orWhere('nis', 'like', '%' . $request->katakunci . '%')
                    ->orWhere('nisn', 'like', '%' . $request->katakunci . '%');
            });
        }

        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        if ($request->filled('bulan')) {
            $query->where('bulan', $request->bulan);
        }

        $transaksi = $query->orderBy('created_at', 'desc')->get();

        // Menjumlahkan total sisa dari semua transaksi yang difilter
        $totalSisa = $transaksi->sum('sisa');
        $setting = Setting::firstOrCreate([]);

        $pdf = PDF::loadView('rekap.rekap_data_pdf', compact('transaksi', 'totalSisa', 'setting'));
        // return $pdf->download('rekap_data.pdf');
        return $pdf->stream('rekap.rekap_data_pdf');
    }
}
