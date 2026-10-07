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
   private function getSchoolPaths()
{
    $profilesekolah = profile_sekolah::first();

    $fotoPath = null;
    if ($profilesekolah && $profilesekolah->foto) {
        $fotoPath = asset('storage/profil/' . ltrim($profilesekolah->foto, '/'));
    }

    $logoPath = null;
    if ($profilesekolah && $profilesekolah->logo) {
        $logoPath = asset('storage/profil/' . ltrim($profilesekolah->logo, '/'));
    }

    $kepsekFotoPath = asset('assets/images/kepala_sekolah.png');

    return compact('profilesekolah', 'fotoPath', 'logoPath', 'kepsekFotoPath');
}

    public function index()
    {
        extract($this->getSchoolPaths());

        $ekstrakurikulers = Ekstrakulikuler::latest()->take(6)->get();
        $beritas = Berita::latest()->take(3)->get();
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalEskul = Ekstrakulikuler::count();

        $gurus = Guru::latest()->take(8)->get();
        $galeris = Galeri::latest()->take(6)->get();

        return view('landingPage.landing_page', compact(
            'profilesekolah',
            'fotoPath',
            'logoPath',
            'kepsekFotoPath',
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
        extract($this->getSchoolPaths());
        $beritas = Berita::latest()->take(6)->get();

        return view('landingPage.berita.semua_berita', compact('profilesekolah', 'fotoPath', 'logoPath', 'kepsekFotoPath', 'beritas'));
    }

    public function semuaGuru()
    {
        extract($this->getSchoolPaths());
        $gurus = Guru::all();

        return view('landingPage.guru.semua_guru', compact('profilesekolah', 'fotoPath', 'logoPath', 'kepsekFotoPath', 'gurus'));
    }

    public function semuaEkskul()
    {
        extract($this->getSchoolPaths());
        $ekskuls = Ekstrakulikuler::all();

        return view('landingPage.ekstrakulikuler.semua_ekstrakulikuler', compact('profilesekolah', 'fotoPath', 'logoPath', 'kepsekFotoPath', 'ekskuls'));
    }

    public function semuaGaleri()
    {
        extract($this->getSchoolPaths());
        $galeris = Galeri::all();

        return view('landingPage.galeri.semua_galeri', compact('profilesekolah', 'fotoPath', 'logoPath', 'kepsekFotoPath', 'galeris'));
    }

    public function profilSekolah()
    {
        extract($this->getSchoolPaths());

        return view('landingPage.profil.profile', compact('profilesekolah', 'fotoPath', 'logoPath', 'kepsekFotoPath'));
    }
}
