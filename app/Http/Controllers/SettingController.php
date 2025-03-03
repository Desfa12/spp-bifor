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
            'nama_satuan'   => 'required|string|max:255',
            'no_lembaga'    => 'nullable|digits_between:8,10',
            'no_tlp'        => ['nullable', 'regex:/^(\+62|0)[0-9]{9,12}$/'],
            'alamat'        => 'nullable|string|max:255',
            'kota'          => 'nullable|string|max:100',
            'kepala_sekolah' => 'nullable|string|max:255',
            'nip_kepsek'    => 'nullable|digits:18',
            'bendahara'     => 'nullable|string|max:255',
            'nip_bendahara' => 'nullable|digits:18',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'no_lembaga.digits_between' => 'Nomor Lembaga harus terdiri dari 8 hingga 10 digit angka.',
            'no_tlp.regex' => 'Format nomor telepon tidak valid. Harus diawali dengan +62 atau 0 dan memiliki panjang 9-12 digit.',
            'nip_kepsek.digits' => 'NIP Kepala Sekolah harus tepat 18 digit.',
            'nip_bendahara.digits' => 'NIP Bendahara harus tepat 18 digit.',
            'logo.image' => 'File yang diunggah harus berupa gambar.',
            'logo.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, atau gif.',
            'logo.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $setting = Setting::firstOrCreate([]);

        // Cek apakah ada file logo yang diunggah
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if (!empty($setting->logo) && file_exists(public_path('logo/' . $setting->logo))) {
                unlink(public_path('logo/' . $setting->logo));
            }

            // Simpan logo baru di public/logo
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('logo'), $filename);

            $setting->logo = $filename;
        }

        // Update data lainnya
        $setting->update($request->except(['_token', '_method', 'logo']));

        return redirect()->route('settings.edit')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
