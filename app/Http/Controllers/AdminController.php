<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ekstrakulikuler; // Sesuaikan dengan penamaan model kamu
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
{
    $totalGuru = Guru::count();
    $totalSiswa = Siswa::count();
    $totalEskel = Ekstrakulikuler::count();
    $totalBerita = Berita::count();
    $totalGaleri = Galeri::count();
    $totalUser = User::count();

    $beritaTerbaru = Berita::latest()->take(5)->get();

    return view('dashboard', compact(
        'totalGuru',
        'totalSiswa',
        'totalEskel',
        'totalBerita',
        'totalGaleri',
        'totalUser',
        'beritaTerbaru',
    ));
}
}