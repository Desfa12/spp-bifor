<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DatakelasController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AuthController; // Menambahkan controller

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

Route::middleware('auth')->group(
    function () {
        Route::get('/', [DashboardController::class, "dashboard"]);
        Route::get('/setting', [SettingController::class, "index"]);
        // Route::get('/datakelas', [DatakelasController::class, "datakelas"]);
        Route::get('/transaksi', [TransaksiController::class, "transaksi"]);
        Route::get('/rekap', [RekapController::class, "rekap"]);
        Route::get('/laporan', [LaporanController::class, "laporan"]);

        Route::prefix('datakelas')->group(function () {
            Route::get('/', [DatakelasController::class, 'index']);
            Route::get('/create', [DatakelasController::class, 'create']);
            Route::post('/', [DatakelasController::class, 'store']);
            Route::get('/{datakelas_id}/edit', [DatakelasController::class, 'edit']);
            Route::put('/{datakelas}', [DatakelasController::class, 'update']);
            Route::delete('/{datakelas_id}', [DatakelasController::class, 'destroy']);
        });
        
        Route::get('/datasiswa', [DatasiswaController::class, "index"]);
        Route::get('/datasiswa/create', [DatasiswaController::class, 'create']);
        Route::post('/datasiswa', [DatasiswaController::class, 'store']);
        Route::get('/datasiswa/{datasiswa_id}/edit', [DatasiswaController::class, 'edit']);
        Route::put('/datasiswa/{datasiswa}', [DatasiswaController::class, 'update']);
        Route::delete('/datasiswa/{datasiswa_id}', [DatasiswaController::class, 'destroy']);

        Route::get('/transaksi', [TransaksiController::class, "index"]);
        Route::get('/transaksi/create', [TransaksiController::class, 'create']);
        Route::post('/transaksi', [TransaksiController::class, 'store']);
        Route::get('/transaksi/{transaksi_id}/edit', [TransaksiController::class, 'edit']);
        Route::put('/transaksi/{transaksi}', [TransaksiController::class, 'update']);
        Route::delete('/transaksi/{transaksi_id}', [TransaksiController::class, 'destroy']);


        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('history', HistoryController::class);
    }
);

Auth::routes();
