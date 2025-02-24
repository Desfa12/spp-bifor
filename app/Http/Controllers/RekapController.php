<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with('siswa');

        // Filter berdasarkan kata kunci (nama siswa, NIS, NISN)
        if ($request->has('katakunci') && !empty($request->katakunci)) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('nama_siswa', 'like', '%' . $request->katakunci . '%')
                    ->orWhere('nis', 'like', '%' . $request->katakunci . '%')
                    ->orWhere('nisn', 'like', '%' . $request->katakunci . '%');
            });
        }

        // Filter berdasarkan tipe pembayaran (SPP, DSP, Lainnya)
        if ($request->has('tipe') && !empty($request->tipe)) {
            $query->where('tipe', $request->tipe);
        }

        $transaksi = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('rekap.index', compact('transaksi'));
    }
}
