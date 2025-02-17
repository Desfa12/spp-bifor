<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Datasiswa; // Pastikan model diimport

class DatasiswaController extends Controller
{
    // Menampilkan semua data siswa
    public function index(Request $request)
    {
        $jumlahbaris = 10; // Menentukan jumlah data per halaman

        // Mengambil data siswa dengan pagination
        $datasiswa = Datasiswa::orderBy('nama_siswa', 'asc')
            ->orderByRaw("CAST(SUBSTRING(kelas, 2) AS UNSIGNED) ASC")
            ->paginate($jumlahbaris);

        return view('datasiswa.index', compact('datasiswa'));
    }


    // Menampilkan form tambah data siswa
    public function create()
    {
        return view('datasiswa.create');
    }

    // Menyimpan data siswa ke database
    public function store(Request $request)
    {
        // Simpan data sementara di session untuk form yang tidak valid
        Session::flash('nis', $request->nis);
        Session::flash('nisn', $request->nisn);
        Session::flash('nama_siswa', $request->nama_siswa);
        Session::flash('kelas', $request->kelas);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('tgl_lahir', $request->tgl_lahir);
        Session::flash('no_telp', $request->no_telp);

        // Validasi input
        $request->validate([
            'nis' => 'required|string|unique:datasiswa,nis,' . $request->id . '|min:8|max:12',
            'nisn' => 'required|string|unique:datasiswa,nisn,' . $request->id . '|min:10|max:12',
            'nama_siswa' => 'required|string',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required|string',
        ], [
            'nis.required' => 'NIS Wajib diisi',
            'nis.string' => 'NIS harus berupa teks',
            'nis.unique' => 'NIS sudah terdaftar',
            'nis.min' => 'NIS harus memiliki minimal 8 karakter',
            'nis.max' => 'NIS tidak boleh lebih dari 12 karakter',
            'nisn.required' => 'NISN Wajib diisi',
            'nisn.string' => 'NISN harus berupa teks',
            'nisn.unique' => 'NISN sudah terdaftar',
            'nisn.min' => 'NISN harus memiliki minimal 10 karakter',
            'nisn.max' => 'NISN tidak boleh lebih dari 12 karakter',
            'nama_siswa.required' => 'Nama siswa wajib diisi',
            'kelas.required' => 'Kelas wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus L atau P',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi',
            'tgl_lahir.date' => 'Format tanggal lahir tidak valid',
            'no_telp.required' => 'No telepon wajib diisi',
        ]);


        // Simpan data
        Datasiswa::create([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->to('datasiswa')->with('success', 'Berhasil menambahkan data');
    }

    // Menampilkan form edit data siswa
    public function edit($id)
    {
        $datasiswa = Datasiswa::findOrFail($id);
        return view('datasiswa.edit', compact('datasiswa'));
    }


    // Menyimpan perubahan data siswa
    public function update(Request $request, Datasiswa $datasiswa)
    {
        // Validasi input
        $request->validate([
            'nama_siswa' => 'required|string',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required|string',
        ], [
            'nama_siswa.required' => 'Nama siswa wajib diisi',
            'kelas.required' => 'Kelas wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus L atau P',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi',
            'tgl_lahir.date' => 'Format tanggal lahir tidak valid',
            'no_telp.required' => 'No telepon wajib diisi',
        ]);

        // Update data siswa
        $datasiswa->update([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->to('datasiswa')->with('success', 'Berhasil melakukan update!');
    }


    // Menghapus data siswa
    public function destroy(Datasiswa $datasiswa)
    {
        $datasiswa->delete();
        return redirect()->to('datasiswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}
