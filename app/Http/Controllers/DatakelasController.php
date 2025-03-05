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
        $status = $request->input('status'); // Ambil filter status

        $query = Kelas::query();

        if ($katakunci) {
            $query->where(function ($q) use ($katakunci) {
                $q->where('tingkat', 'like', "%$katakunci%")
                    ->orWhere('jurusan', 'like', "%$katakunci%")
                    ->orWhere('angkatan', 'like', "%$katakunci%");
            });
        }

        if ($status !== null) {
            $query->where('aktif', $status);
        }

        $datakelas = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('datakelas.index', compact('datakelas', 'katakunci', 'status'));
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
            'spp' => 'nullable|numeric',
            'dsp' => 'nullable|numeric',
            'pts1' => 'nullable|numeric',
            'pas1' => 'nullable|numeric',
            'pts2' => 'nullable|numeric',
            'pas2' => 'nullable|numeric',
            'daftar_ulang' => 'nullable|numeric',
            'lainnya' => 'nullable|numeric',
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
            'spp' => 'nullable|numeric',
            'dsp' => 'nullable|numeric',
            'pts1' => 'nullable|numeric',
            'pas1' => 'nullable|numeric',
            'pts2' => 'nullable|numeric',
            'pas2' => 'nullable|numeric',
            'daftar_ulang' => 'nullable|numeric',
            'lainnya' => 'nullable|numeric',
        ]);

        $datakelas->update($request->all());

        return redirect()->route('datakelas.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();
        return redirect()->route('datakelas.index')->with('success', 'Data kelas berhasil dihapus!');
    }
}
