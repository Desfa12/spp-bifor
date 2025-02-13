<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Method untuk logout
    public function destroy(Request $request)
    {
        Auth::logout(); // Logout pengguna
        $request->session()->invalidate(); // Menghapus sesi
        $request->session()->regenerateToken(); // Regenerasi token CSRF
        return redirect('/login'); // Mengarahkan ke halaman login setelah logout
    }
}
