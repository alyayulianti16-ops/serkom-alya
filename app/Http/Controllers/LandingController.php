<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile_sekolah;
use App\Models\Ekstrakulikuler;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Berita;

class LandingController extends Controller
{
    public function index()
    {
        $profilesekolah = profile_sekolah::first();
        $ekstrakurikulers = Ekstrakulikuler::all();
        $beritas = Berita::latest()->take(3)->get();
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalEskul = Ekstrakulikuler::count();
        $totalBerita = Berita::count();
        $gurus = Guru::all();

        return view('landing_page', compact(
            'profilesekolah',
            'ekstrakurikulers',
            'beritas',
            'totalSiswa',
            'totalGuru',
            'totalEskul',
            'totalBerita',
            'gurus'
        ));
    }
}
