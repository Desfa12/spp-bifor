<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Menampilkan halaman edit setting.
     */
    public function edit()
    {
        // Ambil data setting pertama, jika tidak ada buat baru
        $setting = Setting::firstOrCreate([]);

        return view('settings.index', compact('setting'));
    }

    /**
     * Memproses update data setting.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_satuan' => 'required|string|max:255',
            'no_lembaga' => 'nullable|string|max:50',
            'no_tlp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'kota' => 'nullable|string|max:100',
            'kepala_sekolah' => 'nullable|string|max:255',
            'nip_kepsek' => 'nullable|string|max:50',
            'bendahara' => 'nullable|string|max:255',
            'nip_bendahara' => 'nullable|string|max:50',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $setting = Setting::firstOrCreate([]);
    
        // Cek apakah ada file logo yang diunggah
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($setting->logo && file_exists(public_path('logo/' . $setting->logo))) {
                unlink(public_path('logo/' . $setting->logo));
            }
    
            // Simpan logo baru di public/logo
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('logo'), $filename); // Pindahkan ke public/logo
    
            $setting->logo = $filename;
        }
    
        // Update data lainnya
        $setting->update([
            'nama_satuan' => $request->nama_satuan,
            'no_lembaga' => $request->no_lembaga,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kepala_sekolah' => $request->kepala_sekolah,
            'nip_kepsek' => $request->nip_kepsek,
            'bendahara' => $request->bendahara,
            'nip_bendahara' => $request->nip_bendahara,
        ]);
    
        return redirect()->route('settings.edit')->with('success', 'Pengaturan berhasil diperbarui.');
    }
    
}
