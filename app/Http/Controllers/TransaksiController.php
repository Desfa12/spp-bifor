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
    public function index(Request $request)
    {
        $katakunci = $request->input('katakunci');
        $jenisKelamin = $request->input('jenis_kelamin');

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
        $request->merge([
            'tagihan' => preg_replace('/\D/', '', $request->tagihan),
            'bayar' => preg_replace('/\D/', '', $request->bayar),
            'sisa' => preg_replace('/\D/', '', $request->sisa),
        ]);

        $request->merge([
            'tagihan' => (int) $request->tagihan,
            'bayar' => (int) $request->bayar,
            'sisa' => (int) $request->sisa,
        ]);

        $request->validate([
            'id_siswa' => 'required|integer',
            'sekolah' => 'required|string|max:255',
            'tipe' => 'required|string|max:100',
            'bulan' => 'required|date',
            'tagihan' => 'required|numeric|min:1',
            'bayar' => 'required|numeric|min:0',
            'sisa' => 'required|numeric|min:0',
            'keterangan' => 'required|string|min:3',
        ]);

        $transaksi = Transaksi::create([
            'id_siswa' => $request->id_siswa,
            'sekolah' => $request->sekolah,
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

    public function exportPdf($id)
    {
        $transaksi = Transaksi::with('siswa.kelas')->findOrFail($id);
        $setting = Setting::firstOrCreate([]);

        $pdf = PDF::loadView('transaksi.kwitansi_pdf', compact('transaksi', 'setting'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('transaksi.kwitansi_pdf.pdf');
    }
}
