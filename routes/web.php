<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramKeahlianController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KaryaSiswaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;

// PUBLIK
Route::get('/', [HomeController::class, 'index']);
Route::get('/profil', function () { return view('pages.profil'); });
Route::get('/produk/program-keahlian', [ProgramKeahlianController::class, 'index']);
Route::get('/produk/layanan-fasilitas', [FasilitasController::class, 'index']);
Route::get('/produk/karya-siswa', [KaryaSiswaController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'show']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);
Route::post('/kontak', [KontakController::class, 'store']);

// DASHBOARD ADMIN
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    // Berita
    Route::get('/berita', [BeritaController::class, 'adminIndex'])->name('admin.berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // Karya Siswa
    Route::get('/karya-siswa', [KaryaSiswaController::class, 'adminIndex'])->name('admin.karya.index');
    Route::get('/karya-siswa/create', [KaryaSiswaController::class, 'create'])->name('admin.karya.create');
    Route::post('/karya-siswa', [KaryaSiswaController::class, 'store'])->name('admin.karya.store');
    Route::get('/karya-siswa/{id}/edit', [KaryaSiswaController::class, 'edit'])->name('admin.karya.edit');
    Route::put('/karya-siswa/{id}', [KaryaSiswaController::class, 'update'])->name('admin.karya.update');
    Route::delete('/karya-siswa/{id}', [KaryaSiswaController::class, 'destroy'])->name('admin.karya.destroy');

    // Galeri
    Route::get('/galeri', [GaleriController::class, 'adminIndex'])->name('admin.galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // Pesan
    Route::get('/pesan', [PesanController::class, 'index'])->name('admin.pesan.index');
    Route::get('/pesan/{id}', [PesanController::class, 'show'])->name('admin.pesan.show');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('admin.pesan.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/galeri/{id}/like', [GaleriController::class, 'like'])
    ->name('galeri.like');
    
require __DIR__.'/auth.php';