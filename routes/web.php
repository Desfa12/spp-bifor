<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DatakelasController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

// Route utama
Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : view('welcome');
});

// Otentikasi Laravel
// Auth::routes();
Auth::routes(['reset' => true]);
Route::middleware('guest')->group(function () {
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
        Route::get('/{id}', [DatakelasController::class, 'show'])->name('datakelas.show');
        Route::post('/', [DatakelasController::class, 'store'])->name('datakelas.store');
        Route::get('/{datakelas_id}/edit', [DatakelasController::class, 'edit'])->name('datakelas.edit');
        Route::put('/{datakelas}', [DatakelasController::class, 'update'])->name('datakelas.update');
        Route::delete('/{datakelas_id}', [DatakelasController::class, 'destroy'])->name('datakelas.destroy');

        Route::get('/export/{id}', [DatakelasController::class, 'export'])->name('datakelas.export');
        Route::post('/import/{id}', [DatakelasController::class, 'import'])->name('datakelas.import');
    });

    Route::get('/export', [DatakelasController::class, 'export'])->name('siswa.export');
    Route::post('/import', [DatakelasController::class, 'import'])->name('siswa.import');

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
    // Route::get('/transaksi/export/{id}', [TransaksiController::class, 'exportExcel'])->name('transaksi.export');
    Route::get('/transaksi/export-pdf/{id}', [TransaksiController::class, 'exportPdf'])->name('transaksi.export');

    Route::prefix('rekap')->group(function () {
        Route::get('/', [RekapController::class, 'index'])->name('rekap.index');
        Route::get('/exportPdf', [RekapController::class, 'exportPdf'])->name('rekap.exportPdf');

        Route::post('/datasiswa/import', [DatasiswaController::class, 'import'])->name('datasiswa.import');
        Route::get('/datasiswa/export', [DatasiswaController::class, 'export'])->name('datasiswa.export');
    });
});
