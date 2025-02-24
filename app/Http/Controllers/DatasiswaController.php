<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datasiswa;
use App\Models\Kelas;

class DatasiswaController extends Controller
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

        return view('datasiswa.index', compact('datasiswa', 'katakunci', 'jenisKelamin'));
    }


    // Menampilkan form tambah data
    public function create()
    {
        $kelas = Kelas::where('aktif', 1)->get();
        return view('datasiswa.create', compact('kelas'));
        // return view('datasiswa.create');
    }

    // Menyimpan data siswa ke database
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|unique:siswa,nis',
            'nisn' => 'required|string|unique:siswa,nisn',
            'nama_siswa' => 'required|string',
            'id_kelas' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'nullable|string',
        ]);

        Datasiswa::create($request->all());

        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // Menampilkan form edit data
    public function edit($id)
    {
        $datasiswa = Datasiswa::findOrFail($id);
        $kelas = Kelas::where('aktif', 1)->get();
        return view('datasiswa.edit', compact('datasiswa', 'kelas'));
    }

    // Update data siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|string|unique:siswa,nis,' . $id,
            'nisn' => 'required|string|unique:siswa,nisn,' . $id,
            'nama_siswa' => 'required|string',
            'id_kelas' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'nullable|string',
        ]);

        $datasiswa = Datasiswa::findOrFail($id);
        $datasiswa->update($request->all());

        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    // Hapus data siswa
    public function destroy($id)
    {
        $datasiswa = Datasiswa::findOrFail($id);
        $datasiswa->delete();

        return redirect()->route('datasiswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
