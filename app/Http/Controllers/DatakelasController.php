<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DatakelasController extends Controller
{
    public function index()
    {
        // return view('datakelas.index');
        // return view('datakelas.index', ['data' => Kelas::get()]);
        $jumlahbaris = 10; // Menentukan jumlah data per halaman

        // Mengambil data siswa dengan pagination
        $datakelas = Kelas::paginate($jumlahbaris);

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
    // public function edit($id)
    // {
    //     $datasiswa = Datasiswa::findOrFail($id);
    //     return view('datasiswa.edit', compact('datasiswa'));
    // }


    // // Menyimpan perubahan data siswa
    // public function update(Request $request, Datasiswa $datasiswa)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'nama_siswa' => 'required|string',
    //         'kelas' => 'required|string',
    //         'jurusan' => 'required|string',
    //         'jenis_kelamin' => 'required|in:L,P',
    //         'tgl_lahir' => 'required|date',
    //         'no_telp' => 'required|string',
    //     ], [
    //         'nama_siswa.required' => 'Nama siswa wajib diisi',
    //         'kelas.required' => 'Kelas wajib diisi',
    //         'jurusan.required' => 'Jurusan wajib diisi',
    //         'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
    //         'jenis_kelamin.in' => 'Jenis kelamin harus L atau P',
    //         'tgl_lahir.required' => 'Tanggal lahir wajib diisi',
    //         'tgl_lahir.date' => 'Format tanggal lahir tidak valid',
    //         'no_telp.required' => 'No telepon wajib diisi',
    //     ]);

    //     // Update data siswa
    //     $datasiswa->update([
    //         'nama_siswa' => $request->nama_siswa,
    //         'kelas' => $request->kelas,
    //         'jurusan' => $request->jurusan,
    //         'jenis_kelamin' => $request->jenis_kelamin,
    //         'tgl_lahir' => $request->tgl_lahir,
    //         'no_telp' => $request->no_telp,
    //     ]);

    //     return redirect()->to('datasiswa')->with('success', 'Berhasil melakukan update!');
    // }


    // Menghapus data siswa
    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        return redirect()->to('datakelas')->with('success', 'Data kelas berhasil dihapus!');
    }
}
