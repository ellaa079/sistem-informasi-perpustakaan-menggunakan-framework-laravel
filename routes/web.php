<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PepustakaanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NonsiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.master');
});




Route::get('/siswa', function () {
    return view('siswa');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//database
//buku
Route::get('/dasboard_buku', [PepustakaanController::class,'dasboard_buku'])->name('dasboard_buku');
Route::get('/buku/tambah', [PepustakaanController::class,'buku_tambah'])->name('buku_tambah');
Route::post('/buku/store', [PepustakaanController::class,'store'])->name('buku_store');
Route::get('/buku/edit{Kode}', [PepustakaanController::class,'edit'])->name('buku_edit');
Route::post('/buku/update', [PepustakaanController::class,'update'])->name('buku_update');
Route::get('/buku/delete/{Kode}', [PepustakaanController::class, 'delete'])->name('buku_delete');
Route::get('/buku/cari', [PepustakaanController::class, 'cari'])->name('buku_cari');

//siswa
Route::get('/dasboard_siswa', [SiswaController::class,'dasboard_siswa'])->name('dasboard_siswa');
Route::get('/siswa/tambah', [SiswaController::class,'siswa_tambah'])->name('siswa_tambah');
Route::post('/siswa/store', [SiswaController::class,'store'])->name('siswa_store');
Route::get('/siswa/edit{Kode}', [SiswaController::class,'edit'])->name('siswa_edit');
Route::post('/siswa/update', [SiswaController::class,'update'])->name('siswa_update');
Route::get('/siswa/delete/{Kode}', [SiswaController::class, 'delete'])->name('siswa_delete');
Route::get('/siswa/cari', [SiswaController::class, 'cari'])->name('siswa_cari');

//non siswa
Route::get('/dasboard_non_siswa', [NonsiswaController::class,'dasboard_non_siswa'])->name('dasboard_non_siswa');
Route::get('/non_siswa/tambah', [NonsiswaController::class,'non_siswa_tambah'])->name('non_siswa_tambah');
Route::post('/non_siswa/store', [NonsiswaController::class,'store'])->name('non_siswa_store');
Route::get('/non_siswa/edit{Kode}', [NonsiswaController::class,'edit'])->name('non_siswa_edit');
Route::post('/non_siswa/update', [NonsiswaController::class,'update'])->name('non_siswa_update');
Route::get('/non_siswa/delete/{Kode}', [NonsiswaController::class, 'delete'])->name('non_siswa_delete');
Route::get('/non_siswa/cari', [NonsiswaController::class, 'cari'])->name('non_siswa_cari');

//petugas

Route::get('/dasboard_petugas', [PetugasController::class,'dasboard_petugas'])->name('dasboard_petugas');
Route::get('/petugas/tambah', [PetugasController::class,'petugas_tambah'])->name('petugas_tambah');
Route::post('/petugas/store', [PetugasController::class,'store'])->name('petugas_store');
Route::get('/petugas/edit{Kode}', [PetugasController::class,'edit'])->name('petugas_edit');
Route::post('/petugas/update', [PetugasController::class,'update'])->name('petugas_update');
Route::get('/petugas/delete/{Kode}', [PetugasController::class, 'delete'])->name('petugas_delete');
Route::get('/petugas/cari', [PetugasController::class, 'cari'])->name('petugas_cari');

//transaksi
Route::get('/dasboard_peminjaman', [PeminjamanController::class,'dasboard_peminjaman'])->name('dasboard_peminjaman');
Route::get('/peminjaman/tambah', [PeminjamanController::class,'peminjaman_tambah'])->name('peminjaman_tambah');
Route::post('/peminjaman/store', [PeminjamanController::class,'store'])->name('peminjaman_store');
Route::get('/peminjaman/cari', [PeminjamanController::class, 'cari'])->name('peminjaman_cari');

Route::get('/dasboard_kembali', [PengembalianController::class,'dasboard_pengembalian'])->name('dasboard_pengembalian');
Route::get('/kembali/edit{kode}', [PengembalianController::class,'edit'])->name('pengembalian_edit');
Route::post('/kembali/update', [PengembalianController::class,'update'])->name('pengembalian_update');
Route::get('/kembali/cari', [PengembalianController::class, 'cari'])->name('pengembalian_cari');
//laporan
Route::get('/laporan_buku', [LaporanController::class,'laporan_buku'])->name('laporan_buku');
Route::get('/laporan_anggota', [LaporanController::class,'laporan_anggota'])->name('laporan_anggota');
Route::get('/laporan_non_siswa', [LaporanController::class,'laporan_non_siswa'])->name('laporan_non_siswa');
Route::get('/laporan_peminjaman', [LaporanController::class,'laporan_peminjaman'])->name('laporan_peminjaman');
Route::get('/laporan_pengembalian', [LaporanController::class,'laporan_pengembalian'])->name('laporan_pengembalian');