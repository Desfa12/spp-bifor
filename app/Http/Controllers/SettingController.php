<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::firstOrCreate([]);
        return view('settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_satuan'   => 'required|string|max:255',
            'no_lembaga'    => 'required|numeric|digits_between:8,10',
            'no_tlp'        => ['required', 'regex:/^(\\+62|0)[0-9]{9,12}$/'],
            'alamat'        => 'required|string|max:255',
            'kota'          => 'required|string|max:100',
            'kepala_sekolah' => 'required|string|max:255',
            'nip_kepsek'    => 'required|numeric|digits:18',
            'bendahara'     => 'required|string|max:255',
            'nip_bendahara' => 'required|numeric|digits:18',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required' => ':attribute wajib diisi.',
            'numeric'  => ':attribute harus berupa angka.',
            'digits'   => ':attribute harus :digits digit.',
            'digits_between' => ':attribute harus antara :min - :max digit.',
            'regex'    => ':attribute tidak sesuai format yang benar.',
            'image'    => ':attribute harus berupa gambar.',
            'mimes'    => ':attribute harus berformat jpeg, png, jpg, atau gif.',
            'max'      => ':attribute maksimal :max karakter.',
        ]);

        $setting = Setting::firstOrCreate([]);

        // Menghapus logo lama jika ada file baru diunggah
        if ($request->hasFile('logo')) {
            if (!empty($setting->logo) && file_exists(public_path('logo/' . $setting->logo))) {
                @unlink(public_path('logo/' . $setting->logo));
            }

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('logo'), $filename);
            $setting->logo = $filename;
        }

        $setting->update($request->except(['_token', '_method', 'logo']));

        return redirect()->route('settings.edit')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
