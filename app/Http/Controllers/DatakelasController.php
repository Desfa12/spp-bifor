<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Kelas;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DatakelasController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->input('katakunci');
        $status = $request->input('status'); // Ambil filter status

        // Menggunakan withCount untuk menghitung jumlah siswa dalam setiap kelas
        $query = Kelas::with('siswa')->withCount('siswa');

        if (!empty($katakunci)) {
            $query->where(function ($q) use ($katakunci) {
                $q->where('tingkat', 'like', "%$katakunci%")
                    ->orWhere('jurusan', 'like', "%$katakunci%")
                    ->orWhere('angkatan', 'like', "%$katakunci%");
            });
        }

        if ($status !== null && $status !== '') {
            $query->where('aktif', $status);
        }

        $datakelas = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('datakelas.index', compact('datakelas', 'katakunci', 'status'));
    }

    public function show($id)
    {
        $datakelas = Kelas::with('siswa')->findOrFail($id);
        return view('datakelas.show', compact('datakelas'));
    }

    public function create()
    {
        return view('datakelas.create');
    }

    public function store(Request $request)
    {
        Session::flash('input', $request->all());

        $request->validate([
            'tingkat' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'aktif' => 'required|string',
        ]);

        Kelas::create($request->all());

        return redirect()->route('datakelas.index')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $datakelas = Kelas::findOrFail($id);
        return view('datakelas.edit', compact('datakelas'));
    }

    public function update(Request $request, Kelas $datakelas)
    {
        Session::flash('input', $request->all());

        $request->validate([
            'tingkat' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|string',
            'aktif' => 'required|string',
        ]);

        $datakelas->update($request->all());

        return redirect()->route('datakelas.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);

        // Hapus semua siswa yang terkait dengan kelas ini
        $kelas->siswa()->delete();

        // Hapus kelas
        $kelas->delete();

        return redirect()->route('datakelas.index')->with('success', 'Data kelas dan seluruh siswa di dalamnya berhasil dihapus!');
    }


    public function export($id)
    {
        $kelas = Kelas::findOrFail($id);
        return Excel::download(new SiswaExport($id), 'data_siswa_' . $kelas->tingkat . '_' . $kelas->jurusan . '.xlsx');
    }

    public function import(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new SiswaImport($id), $request->file('file'));

        return redirect()->back()->with('success', 'Data siswa berhasil diimpor ke kelas yang dipilih!');
    }
}
