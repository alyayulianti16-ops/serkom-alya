<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landingPage.landing.index');
Route::get('/berita', [LandingController::class, 'semuaBerita'])->name('landingPage.berita.semua_berita');
Route::get('/semua-guru', [LandingController::class, 'semuaGuru'])->name('landingPage.guru.semua_guru');
Route::get('/semua-ekstrakurikuler', [LandingController::class, 'semuaEkskul'])->name('landingPage.ekskul.semua_ekskul');
Route::get('/semua-galeri', [LandingController::class, 'semuaGaleri'])->name('landingPage.galeri.semua_galeri');
Route::get('/profil-sekolah', [LandingController::class, 'profilSekolah'])->name('landingPage.profil.semua_profil');
Route::get('/guru/detail/{id}', [LandingController::class, 'detailGuru'])->name('landingPage.guru.detail');
Route::get('/galeri/{id}', [LandingController::class, 'detailGaleri'])->name('landingPage.galeri.detail');
Route::get('/ekstrakurikuler/{id}', [LandingController::class, 'detailEkskul'])->name('landingPage.ekskul.detail');
Route::get('/berita/{id}', [LandingController::class, 'detailBerita'])->name('landingPage.berita.detail');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

Route::middleware('checkauth:Admin,Operator')->group(function () {

    Route::get('/administrator', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/operator', [AdminController::class, 'dashboard'])->name('operator.dashboard');

    Route::get('/administrator/profile_sekolah', [ProfileController::class, 'index'])->name('profile_sekolah.index');
    Route::get('/administrator/profile_sekolah/edit', [ProfileController::class, 'edit'])->name('profile_sekolah.edit');
    Route::post('/administrator/profile_sekolah/update', [ProfileController::class, 'update'])->name('profile_sekolah.update');

    Route::get('/administrator/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/administrator/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/administrator/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/administrator/siswa/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/administrator/siswa/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::post('/administrator/siswa/delete', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    Route::get('/administrator/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/administrator/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/administrator/guru/store', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/administrator/guru/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::post('/administrator/guru/update', [GuruController::class, 'update'])->name('guru.update');
    Route::post('/administrator/guru/delete', [GuruController::class, 'destroy'])->name('guru.destroy');

    Route::get('/administrator/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/administrator/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/administrator/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/administrator/berita/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('/administrator/berita/update', [BeritaController::class, 'update'])->name('berita.update');
    Route::post('/administrator/berita/delete', [BeritaController::class, 'destroy'])->name('berita.destroy');

    Route::get('/administrator/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/administrator/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::post('/administrator/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
    Route::get('/administrator/galeri/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::post('/administrator/galeri/update', [GaleriController::class, 'update'])->name('galeri.update');
    Route::post('/administrator/galeri/delete', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    Route::get('/administrator/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakurikuler.index');
    Route::get('/administrator/ekstrakulikuler/create', [EkstrakulikulerController::class, 'create'])->name('ekstrakurikuler.create');
    Route::post('/administrator/ekstrakulikuler/store', [EkstrakulikulerController::class, 'store'])->name('ekstrakurikuler.store');
    Route::get('/administrator/ekstrakulikuler/edit', [EkstrakulikulerController::class, 'edit'])->name('ekstrakurikuler.edit');
    Route::post('/administrator/ekstrakulikuler/update', [EkstrakulikulerController::class, 'update'])->name('ekstrakurikuler.update');
    Route::post('/administrator/ekstrakulikuler/delete', [EkstrakulikulerController::class, 'destroy'])->name('ekstrakurikuler.destroy');
});

Route::middleware('checkauth:Admin')->group(function () {

    Route::get('/administrator/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/administrator/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/administrator/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/administrator/users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/administrator/users/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/administrator/users/delete', [UserController::class, 'destroy'])->name('users.destroy');
});
