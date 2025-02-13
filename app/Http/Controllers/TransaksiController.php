<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Siswa; // Pastikan Anda mengimpor model Siswa jika Anda menggunakan relasi
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan semua data transaksi berdasarkan pencarian
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;

        if (strlen($katakunci)) {
            $datasiswa = Datasiswa::where('nama_siswa', 'like', "%$katakunci%")
           
                ->paginate($jumlahbaris);
        } else {
            $datasiswa = Datasiswa::orderBy('nama_siswa', 'asc')
            ->orderByRaw("CAST(SUBSTRING(kelas, 2) AS UNSIGNED) ASC")
            ->paginate($jumlahbaris);
        }
    }

        return view('transaksi.index')->with('transaksi', $datasiswa);
    }

    // Menampilkan Form untuk Menambah Transaksi
    public function create()
    {
        $siswa = Siswa::all(); // Ambil daftar siswa
        return view('transaksi.create', compact('siswa'));
    }

    // Menyimpan Transaksi Baru
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'bulan' => 'required|string',
            'jumlah_tagihan' => 'required|numeric',
            'telah_dibayar' => 'required|numeric',
            'sisa' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Transaksi::create([
            'siswa_id' => $request->siswa_id,
            'bulan' => $request->bulan,
            'jumlah_tagihan' => $request->jumlah_tagihan,
            'telah_dibayar' => $request->telah_dibayar,
            'sisa' => $request->sisa,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    // Menampilkan Form untuk Mengedit Transaksi
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $siswa = Siswa::all();
        return view('transaksi.edit', compact('transaksi', 'siswa'));
    }

    // Memperbarui Data Transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'bulan' => 'required|string',
            'jumlah_tagihan' => 'required|numeric',
            'telah_dibayar' => 'required|numeric',
            'sisa' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'siswa_id' => $request->siswa_id,
            'bulan' => $request->bulan,
            'jumlah_tagihan' => $request->jumlah_tagihan,
            'telah_dibayar' => $request->telah_dibayar,
            'sisa' => $request->sisa,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Menghapus Transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
