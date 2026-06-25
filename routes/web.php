<?php

use App\Http\Controllers\AreaPelayaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DockingController;
use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PelabuhanController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\DokumenKapalController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TipeKapalController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');



/*
|--------------------------------------------------------------------------
| AUTH USER (ADMIN + MANAJEMEN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Settings
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])
        ->name('settings.profile.edit');

    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])
        ->name('settings.profile.update');

    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])
        ->name('settings.profile.destroy');

    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])
        ->name('settings.password.edit');

    Route::put('settings/password', [Settings\PasswordController::class, 'update'])
        ->name('settings.password.update');

    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])
        ->name('settings.appearance.edit');

    Route::put('settings/appearance', [Settings\AppearanceController::class, 'update'])
        ->name('settings.appearance.update');

    /*
    |--------------------------------------------------------------------------
    | REPORT (ADMIN + MANAJEMEN)
    |--------------------------------------------------------------------------
    */

    Route::get('/report/dokumen', [ReportController::class, 'dokumen'])
        ->name('report.dokumen');
    Route::get('/report/dokumen/print', [ReportController::class, 'printDokumen'])
        ->name('report.dokumen.print');

    Route::get('/report/expired', [ReportController::class, 'expired'])
        ->name('report.expired');
    Route::get(
        '/report/expired/print',
        [ReportController::class, 'printExpired']
    )->name('report.expired.print');

    Route::get('/report/dokumen/warning', [ReportController::class, 'warning'])
        ->name('report.warning');
    Route::get(
        '/report/warning/print',
        [ReportController::class, 'printWarning']
    )->name('report.warning.print');

    Route::get('/report/kapal', [ReportController::class, 'kapal'])
        ->name('report.kapal');
    Route::get('/report/kapal/print', [ReportController::class, 'printKapal'])
        ->name('report.kapal.print');

    Route::get('/report/operator', [ReportController::class, 'operator'])
        ->name('report.operator');
    Route::get('/report/operator/print', [ReportController::class, 'printOperator'])
        ->name('report.operator.print');

    Route::get('/report/pelabuhan', [ReportController::class, 'pelabuhan'])
        ->name('report.pelabuhan');
    Route::get('/report/pelabuhan/print', [ReportController::class, 'printPelabuhan'])
        ->name('report.pelabuhan.print');

    Route::get('/report/statistik', [ReportController::class, 'statistik'])
        ->name('report.statistik');
    Route::get('/report/statistik/print', [ReportController::class, 'printStatistik'])
        ->name('report.statistik.print');

    Route::get('/report/per-kapal', [ReportController::class, 'perKapal'])
        ->name('report.per-kapal');
    Route::get('/report/per-kapal/print', [ReportController::class, 'printPerKapal'])
        ->name('report.per-kapal.print');

    Route::get('/report/docking', [ReportController::class, 'docking'])
        ->name('report.docking');
    Route::get('/report/docking/print', [ReportController::class, 'printDocking'])
        ->name('report.docking.print');
});



/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('user', UserController::class);

    Route::resource('kapal', KapalController::class);

    Route::resource('tipe-kapal', TipeKapalController::class);

    Route::resource('operator', OperatorController::class);

    Route::resource('pelabuhan', PelabuhanController::class);

    Route::resource('jenis-dokumen', JenisDokumenController::class)
        ->parameters([
            'jenis-dokumen' => 'jenisDokumen'
        ]);

    Route::resource('dokumen-kapal', DokumenKapalController::class)
        ->parameters([
            'dokumen-kapal' => 'dokumenKapal'
        ]);

    Route::resource('docking', DockingController::class);

    Route::resource('area-pelayaran', AreaPelayaranController::class)
        ->parameters([
            'area-pelayaran' => 'areaPelayaran'
        ]);

    Route::resource('klasifikasi', KlasifikasiController::class);
});



require __DIR__ . '/auth.php';
