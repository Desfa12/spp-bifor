<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DatakelasController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController; // Menambahkan controller
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/asdasd', [WelcomeController::class, "index"]);

Route::middleware('auth')->group(
    function () {
        Route::get('/', [DashboardController::class, "index"]);
        // Route::get('/setting', [SettingController::class, "index"]);
        // Route::get('/datakelas', [DatakelasController::class, "datakelas"]);
        Route::get('/transaksi', [TransaksiController::class, "transaksi"]);
        Route::get('/rekap', [RekapController::class, "rekap"]);
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
            Route::get('/', [DatasiswaController::class, 'index'])->name('datasiswa.index'); // Tampilkan semua data siswa
            Route::get('/create', [DatasiswaController::class, 'create'])->name('datasiswa.create'); // Form tambah data
            Route::post('/', [DatasiswaController::class, 'store'])->name('datasiswa.store'); // Simpan data baru
            Route::get('/{id}/edit', [DatasiswaController::class, 'edit'])->name('datasiswa.edit'); // Form edit data
            Route::put('/{id}', [DatasiswaController::class, 'update'])->name('datasiswa.update'); // Update data siswa
            Route::delete('/{id}', [DatasiswaController::class, 'destroy'])->name('datasiswa.destroy'); // Hapus data siswa
        });

        Route::prefix('transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
        // Route::get('/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/', [TransaksiController::class, 'store'])->name('transaksi.store');
        });

        // Route::get('transaksi/', [TransaksiController::class, "index"]);
        // Route::get('/transaksi/create', [TransaksiController::class, 'create']);
        // Route::post('/transaksi', [TransaksiController::class, 'store']);
        // Route::get('/transaksi/{transaksi_id}/edit', [TransaksiController::class, 'edit']);
        // Route::put('/transaksi/{transaksi}', [TransaksiController::class, 'update']);
        // Route::delete('/transaksi/{transaksi_id}', [TransaksiController::class, 'destroy']);


        // Route::resource('siswa', SiswaController::class);
        // Route::resource('kelas', KelasController::class);
        // Route::resource('history', HistoryController::class);
    }
);

Auth::routes();
