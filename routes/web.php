<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DatakelasController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;

// Route utama
Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : view('welcome');
});

// Otentikasi Laravel
// Auth::routes();
Auth::routes(['reset' => true]);
Route::middleware('guest')->group(function () {
    // Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    // Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    // Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.forgot');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'validateUniqueCode'])->name('password.validate');
    Route::get('/reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset.form');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');
});

// Dashboard hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::get('/laporan', [LaporanController::class, "laporan"]);

    Route::prefix('settings')->group(function () {
        Route::get('/edit', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/update', [SettingController::class, 'update'])->name('settings.update');
    });

    Route::prefix('datakelas')->group(function () {
        Route::get('/', [DatakelasController::class, 'index'])->name('datakelas.index');
        Route::get('/create', [DatakelasController::class, 'create'])->name('datakelas.create');
        Route::post('/', [DatakelasController::class, 'store'])->name('datakelas.store');
        Route::get('/{datakelas_id}/edit', [DatakelasController::class, 'edit'])->name('datakelas.edit');
        Route::put('/{datakelas}', [DatakelasController::class, 'update'])->name('datakelas.update');
        Route::delete('/{datakelas_id}', [DatakelasController::class, 'destroy'])->name('datakelas.destroy');
    });

    Route::prefix('datasiswa')->group(function () {
        Route::get('/', [DatasiswaController::class, 'index'])->name('datasiswa.index');
        Route::get('/create', [DatasiswaController::class, 'create'])->name('datasiswa.create');
        Route::post('/', [DatasiswaController::class, 'store'])->name('datasiswa.store');
        Route::get('/{id}/edit', [DatasiswaController::class, 'edit'])->name('datasiswa.edit');
        Route::put('/{id}', [DatasiswaController::class, 'update'])->name('datasiswa.update');
        Route::delete('/{id}', [DatasiswaController::class, 'destroy'])->name('datasiswa.destroy');
    });

    Route::prefix('transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::post('/', [TransaksiController::class, 'store'])->name('transaksi.store');
    });

    Route::prefix('rekap')->group(function () {
        Route::get('/', [RekapController::class, 'index'])->name('rekap.index');
        Route::get('/exportPdf', [RekapController::class, 'exportPdf'])->name('rekap.exportPdf');
    });
});
