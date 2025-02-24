<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with('siswa');

        if ($request->has('katakunci')) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('nama_siswa', 'like', '%' . $request->katakunci . '%')
                    ->orWhere('nis', 'like', '%' . $request->katakunci . '%')
                    ->orWhere('nisn', 'like', '%' . $request->katakunci . '%');
            });
        }

        $transaksi = $query->orderBy('created_at', 'desc')->paginate(10);
        // return $transaksi;
        return view('rekap.index', compact('transaksi'));
    }
}
