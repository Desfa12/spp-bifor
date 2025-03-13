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
            'no_lembaga'    => 'nullable|digits_between:8,10',
            'no_tlp'        => ['nullable', 'regex:/^(\\+62|0)[0-9]{9,12}$/'],
            'alamat'        => 'nullable|string|max:255',
            'kota'          => 'nullable|string|max:100',
            'kepala_sekolah' => 'nullable|string|max:255',
            'nip_kepsek'    => 'nullable|digits:18',
            'bendahara'     => 'nullable|string|max:255',
            'nip_bendahara' => 'nullable|digits:18',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $setting = Setting::firstOrCreate([]);

        if ($request->hasFile('logo')) {
            if (!empty($setting->logo) && file_exists(public_path('logo/' . $setting->logo))) {
                unlink(public_path('logo/' . $setting->logo));
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
