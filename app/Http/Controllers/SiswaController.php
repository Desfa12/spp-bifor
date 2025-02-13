<?php

namespace App\Http\Controllers;

use App\Models\Siswa; // Pastikan model diimport
use App\Models\Kelas; // Pastikan model diimport
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->paginate(10); // Ambil data dengan relasi ke kelas
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all(); // Ambil semua data kelas untuk dropdown
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'nama_siswa' => 'required|string|max:255',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'nama_siswa' => 'required|string|max:255',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
