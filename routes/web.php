<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CetakGajiController;

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

Route::middleware('web')->group(function () {
    Route::get('/registration', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/store', [AuthController::class, 'store'])->name('auth.store');
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/auth', [AuthController::class, 'authentication'])->name('auth.authentication');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('auth.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});




// // Route accounting dan karyawan
// Route::middleware(['can:isAccountingOrKaryawan'])->group(function () {
//     Route::get('/karyawan/{id}/show', [UserController::class, 'show']);
//     Route::get('/golongan/{id}/show', [GolonganController::class, 'show']);
//     Route::get('/cuti/{id}/show', [CutiController::class, 'show']);
//     Route::get('/lembur/{id}/show', [LemburController::class, 'show']);
// });



// admin
// golongan
// karyawan
// lebmbur
// penggajian (index, show, hapus)

// Karyawan bisa read
// lembur, cuti, karyawan show
Route::middleware('auth')->group(function () {
    Route::get('/golongan/{id}/show', [GolonganController::class, 'show'])->name('golongan.id.show');
    Route::get('/cuti/{id}/show', [CutiController::class, 'show'])->name('cuti.id.show');
    Route::get('/lembur/{id}/show', [LemburController::class, 'show'])->name('lembur.id.show');
    Route::get('/karyawan/{id}/show', [KaryawanController::class, 'show'])->name('karyawan.id.show');
    Route::get('/penggajian/{id}/show', [PenggajianController::class, 'show'])->name('penggajian.id.show');
    Route::get('/dashboard', function () {
        return view('auth.dashboard');
    })->name('auth.dashboard');
});
// accounting bisa
// lihat data karyawan (index, show)
// lihat data golongan (index, show)
// cuti (index, show)
// lembur (index, show)
// penggajian (semua except hapus)


// Accounting
Route::middleware(['can:isAccounting'])->group(function () {
    Route::get('/accounting/penggajian', [PenggajianController::class, 'index'])->name('accounting.penggajian.index');
    Route::get('/accounting/penggajian/create', [PenggajianController::class, 'create'])->name('accounting.penggajian.create');
    Route::post('/accounting/penggajian/create', [PenggajianController::class, 'store'])->name('accounting.penggajian.store');
    Route::get('/accounting/penggajian/{penggajian}', [PenggajianController::class, 'show'])->name('accounting.penggajian.show');
    Route::get('/accounting/penggajian/{penggajian}/edit', [PenggajianController::class, 'edit'])->name('accounting.penggajian.edit');
    Route::put('/accounting/penggajian/{penggajian}/update', [PenggajianController::class, 'update'])->name('accounting.penggajian.update');
    // Route::resource('/penggajian', PenggajianController::class)->except('destroy');
});

// // Karyawan
// Route::middleware(['can:isKaryawan'])->group(function () {
// });

// Admin
Route::middleware(['can:isAdmin'])->group(function () {
    Route::resource('/karyawan', KaryawanController::class);
    Route::resource('/golongan', GolonganController::class);
    Route::get('/admin/penggajian', [PenggajianController::class, 'index'])->name('admin.penggajian.index');
    Route::get('/admin/penggajian/{penggajian}', [PenggajianController::class, 'show'])->name('admin.penggajian.show');
    Route::get('/admin/penggajian/{penggajian}/edit', [PenggajianController::class, 'edit'])->name('admin.penggajian.edit');
    Route::put('/admin/penggajian/{penggajian}/update', [PenggajianController::class, 'update'])->name('admin.penggajian.update');
    Route::delete('/admin/penggajian/{penggajian}', [PenggajianController::class, 'destroy'])->name('admin.penggajian.destroy');

    // Route::resource('/penggajian', PenggajianController::class)->only(['index','update', 'edit', 'show', 'destroy']);
    Route::resource('/lembur', LemburController::class);
    Route::resource('/cuti', CutiController::class);
    // Route::get('/export/gaji', [ExportDataToExcel::class, 'exportGaji']);
});


Route::get('/kontak', function () {
    return view('template.kontak');
})->name('kontak');
Route::get('/profil-perusahaan', function () {
    return view('template.home');
})->name('beranda');

Route::get('/getEmployee/{id}', [PenggajianController::class, 'getEmployeeData']);
Route::get('/getEmployee/{id}/lembur',  [PenggajianController::class, 'getEmployeeLembur']);
Route::get('/getEmployee/{id}/golongan',  [PenggajianController::class, 'getEmployeeGolongan']);
Route::get('/getEmployee/{id}/cuti',  [PenggajianController::class, 'getEmployeeCuti']);


// Route::get('/cetak-gaji/{show}', 'PenggajianController@cetakgaji')->name('cetak-gaji');

Route::get('/cetak-gaji/{penggajian}', [CetakGajiController::class ,'cetakgaji'])->name('cetak-gaji');