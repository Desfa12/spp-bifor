<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /**
     * Menampilkan form untuk memasukkan kode unik
     */
    public function showForgotPasswordForm()
    {
        return view('auth.passwords.check-code');
    }

    /**
     * Validasi kode unik dan arahkan ke halaman reset password
     */
    public function validateUniqueCode(Request $request)
    {
        $request->validate([
            'unique_code' => 'required|string|exists:users,unique_code',
        ], [
            'unique_code.exists' => 'Kode unik tidak ditemukan.',
        ]);

        session(['unique_code' => $request->unique_code]); // Simpan dalam sesi

        return redirect()->route('password.reset.form');
    }

    /**
     * Menampilkan form reset password
     */
    public function showResetPasswordForm()
    {
        $unique_code = session('unique_code');
        if (!$unique_code) {
            return redirect()->route('password.forgot')->withErrors(['unique_code' => 'Kode unik tidak ditemukan.']);
        }

        return view('auth.passwords.reset-password', compact('unique_code'));
    }

    /**
     * Proses reset password
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.exists' => 'Email tidak sesuai dengan data pengguna.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $unique_code = session('unique_code');
        if (!$unique_code) {
            return redirect()->route('password.forgot')->withErrors(['unique_code' => 'Kode unik tidak valid atau sudah digunakan.']);
        }

        // Ambil user berdasarkan kode unik
        $user = User::where('unique_code', $unique_code)->first();

        if (!$user || $user->email !== $request->email) {
            return back()->withErrors(['email' => 'Email tidak sesuai dengan kode unik.']);
        }

        // Update password dan hapus kode unik
        $user->update([
            'password' => Hash::make($request->password),
            // 'unique_code' => null,
        ]);

        session()->forget('unique_code'); // Hapus sesi

        return redirect('/login')->with('status', 'Password berhasil direset. Silakan login dengan password baru.');
    }
}
