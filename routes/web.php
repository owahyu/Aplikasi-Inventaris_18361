<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanValidationController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.login.index');
});

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('user', UserController::class)->middleware('userAkses:administrator');
    Route::resource('ruang', RuangController::class)->middleware('userAkses:administrator');
    Route::resource('peminjaman', PeminjamanController::class)->middleware('userAkses:administrator|operator');
    Route::resource('pegawai', PegawaiController::class)->middleware('userAkses:administrator');

    Route::get('jenis', [JenisController::class, 'index'])->name('jenis.index')->middleware('userAkses:administrator');
    Route::get('jenis/create', [JenisController::class, 'create'])->name('jenis.create')->middleware('userAkses:administrator');
    Route::post('jenis', [JenisController::class, 'store'])->name('jenis.store')->middleware('userAkses:administrator');
    Route::get('jenis/{jenis}/edit', [JenisController::class, 'edit'])->name('jenis.edit')->middleware('userAkses:administrator');
    Route::put('jenis/{jenis}', [JenisController::class, 'update'])->name('jenis.update')->middleware('userAkses:administrator');
    Route::delete('jenis/{jenis}', [JenisController::class, 'destroy'])->name('jenis.destroy')->middleware('userAkses:administrator');

    Route::get('inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create')->middleware('userAkses:administrator');
    Route::post('inventaris', [InventarisController::class, 'store'])->name('inventaris.store')->middleware('userAkses:administrator');
    Route::get('inventaris/{inventaris}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit')->middleware('userAkses:administrator');
    Route::put('inventaris/{inventaris}', [InventarisController::class, 'update'])->name('inventaris.update')->middleware('userAkses:administrator');
    Route::delete('inventaris/{inventaris}', [InventarisController::class, 'destroy'])->name('inventaris.destroy')->middleware('userAkses:administrator');
    Route::get('inventaris/{inventaris}', [InventarisController::class, 'show'])->name('inventaris.show')->middleware('userAkses:administrator');
    Route::get('inventaris', [InventarisController::class, 'index'])->name('inventaris.index')->middleware('userAkses:administrator');

    Route::get('/validate', [PeminjamanValidationController::class, 'index'])->name('validate.validate.index')->middleware('userAkses:administrator|kepala_gudang');
    Route::post('/validate/approve/{id}', [PeminjamanValidationController::class, 'approve'])->name('validate.approve')->middleware('userAkses:administrator|kepala_gudang');
    Route::post('/validate/reject/{id}', [PeminjamanValidationController::class, 'reject'])->name('validate.reject')->middleware('userAkses:administrator|kepala_gudang');
});
