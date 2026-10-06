<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile_sekolah;
use App\Models\Ekstrakulikuler;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Galeri;

class LandingController extends Controller
{
    public function index()
    {
        $profilesekolah = profile_sekolah::first();
        $ekstrakurikulers = Ekstrakulikuler::latest()->take(6)->get();
        $beritas = Berita::latest()->take(3)->get();
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalEskul = Ekstrakulikuler::count();
        $gurus = Guru::latest()->take(8)->get();
        $galeris = Galeri::latest()->take(6)->get();

        return view('landingPage.landing_page', compact(
            'profilesekolah',
            'ekstrakurikulers',
            'beritas',
            'totalSiswa',
            'totalGuru',
            'totalEskul',
            'gurus',
            'galeris'
        ));
    }

    public function semuaBerita()
    {
        $profilesekolah = profile_sekolah::first();
        $beritas = Berita::latest()->take(6)->get();;

        return view('landingPage.semua_berita', compact('profilesekolah', 'beritas'));
    }
    public function semuaGuru()
    {
        $profilesekolah = profile_sekolah::first();
        $gurus = Guru::all();

        return view('landingPage.semua_guru', compact('profilesekolah', 'gurus'));
    }
    public function semuaEkskul()
    {
        $profilesekolah = profile_sekolah::first();
        $ekskuls = ekstrakulikuler::all();

        return view('landingPage.semua_ekstrakulikuler', compact('profilesekolah', 'ekskuls'));
    }
    public function semuaGaleri()
    {
        $profilesekolah = profile_sekolah::first();
        $galeris = Galeri::all();

        return view('landingPage.semua_galeri', compact('profilesekolah', 'galeris'));
    }
    public function profilSekolah()
    {
        $profilesekolah = profile_sekolah::first();

        return view('landingPage.semua_profil', compact('profilesekolah'));
    }
}
