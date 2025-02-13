<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = History::with('siswa')->paginate(10); // Menampilkan data history beserta informasi siswa
        return view('history.index', compact('history'));
    }

    public function create()
    {
        $siswa = Siswa::all(); // Ambil data siswa untuk dropdown
        return view('history.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id',
            'pembayaran' => 'required|numeric',
        ]);

        History::create([
            'id_siswa' => $request->id_siswa,
            'pembayaran' => $request->pembayaran,
        ]);

        return redirect()->route('history.index')->with('success', 'History pembayaran berhasil ditambahkan');
    }

    public function edit(History $history)
    {
        $siswa = Siswa::all();
        return view('history.edit', compact('history', 'siswa'));
    }

    public function update(Request $request, History $history)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id',
            'pembayaran' => 'required|numeric',
        ]);

        $history->update([
            'id_siswa' => $request->id_siswa,
            'pembayaran' => $request->pembayaran,
        ]);

        return redirect()->route('history.index')->with('success', 'History pembayaran berhasil diperbarui');
    }

    public function destroy(History $history)
    {
        $history->delete();
        return redirect()->route('history.index')->with('success', 'History pembayaran berhasil dihapus');
    }
}