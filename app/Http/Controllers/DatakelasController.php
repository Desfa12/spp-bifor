<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DatakelasController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->input('katakunci');

        $datakelas = Kelas::when($katakunci, function ($query, $katakunci) {
                return $query->where('tingkat', 'like', "%$katakunci%")
                            ->orWhere('jurusan', 'like', "%$katakunci%")
                            ->orWhere('angkatan', 'like', "%$katakunci%");
            })
            ->orderBy('tingkat', 'asc')
            ->paginate(10);

        return view('datakelas.index', compact('datakelas'));
    }


    // Menampilkan form tambah data siswa
    public function create()
    {
        return view('datakelas.create');
    }

    // Menyimpan data siswa ke database
    public function store(Request $request)
    {
        // Simpan data sementara di session untuk form yang tidak valid
        Session::flash('tingkat', $request->tingkat);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('angkatan', $request->angkatan);

        // Validasi input
        $request->validate([
            'tingkat' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
        ], [
            'tingkat.required' => 'Tingkat Wajib diisi',
            'jurusan.string' => 'Jurusan Wajib diisi',
            'angkatan.unique' => 'Angkatan Wajib diisi',
        ]);


        // Simpan data
        Kelas::create([
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan
        ]);

        return redirect()->to('datakelas')->with('success', 'Berhasil menambahkan data');
    }

    // Menampilkan form edit data siswa
    public function edit($id)
    {
        $datakelas = Kelas::findOrFail($id);
        return view('datakelas.edit', compact('datakelas'));
    }


    // // Menyimpan perubahan data siswa
    public function update(Request $request, Kelas $datakelas)
    {
        // Simpan data sementara di session untuk form yang tidak valid
        Session::flash('tingkat', $request->tingkat);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('angkatan', $request->angkatan);

        // Validasi input
        $request->validate([
            'tingkat' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
        ], [
            'tingkat.required' => 'Tingkat Wajib diisi',
            'jurusan.required' => 'Jurusan Wajib diisi',
            'angkatan.required' => 'Angkatan Wajib diisi',
        ]);

        // Update data
        $datakelas->update([
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
        ]);

        return redirect()->to('datakelas')->with('success', 'Data berhasil diperbarui');
    }


    // Menghapus data siswa
    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        return redirect()->to('datakelas')->with('success', 'Data kelas berhasil dihapus!');
    }
}
