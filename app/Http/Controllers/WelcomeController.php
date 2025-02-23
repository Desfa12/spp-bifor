<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate([]);
        
        return view('welcome', compact('setting'));
    }
}
