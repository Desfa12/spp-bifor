<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // $settings = Setting::all();
        // return view('settings.index', compact('settings'));
        return view('setting.index');
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());
        return redirect()->route('settings.index');
    }
}
