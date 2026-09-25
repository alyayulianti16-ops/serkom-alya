<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::group(['middleware' => [function ($request, $next) {
        if (Auth::check() && in_array(Auth::user()->role, ['Admin', 'Operator'])) {
            return $next($request);
        }
        abort(403, 'Akses ditolak!');
    }]], function () {
        // Profile Sekolah
        Route::get('/profile_sekolah', [ProfileController::class, 'index'])->name('profile_sekolah.index');
        Route::get('/profile_sekolah/edit', [ProfileController::class, 'edit'])->name('profile_sekolah.edit');
        Route::post('/profile_sekolah/update', [ProfileController::class, 'update'])->name('profile_sekolah.update');

        // Data Siswa
        Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
        Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

        // Data Guru
        Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
        Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
        Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
        Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
        Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
        Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
    });

    Route::group(['middleware' => [function ($request, $next) {
        if (Auth::check() && Auth::user()->role === 'Admin') {
            return $next($request);
        }
        abort(403, 'Akses ditolak! Halaman ini khusus Admin.');
    }]], function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
        Route::post('/users/delete', [UserController::class, 'destroy'])->name('users.destroy');
    });
});
