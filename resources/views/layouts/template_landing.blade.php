<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $profilesekolah->nama_sekolah ?? 'SMPN 1 Sukarame')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .bg-custom-purple { background-color: #7c3aed !important; }
        .text-custom-purple { color: #7c3aed !important; }
        html { scroll-behavior: smooth; }
    </style>
    @yield('styles')
</head>
<body class="bg-light">

    @php
        $logoPath = null;
        if (isset($profilesekolah) && $profilesekolah && $profilesekolah->logo) {
            $logo = ltrim($profilesekolah->logo, '/');
            $logoPath = str_starts_with($logo, 'profil/') ? asset('storage/' . $logo) : asset('storage/profil/' . $logo);
        }
    @endphp

    <nav class="navbar navbar-expand-lg navbar-dark bg-custom-purple fixed-top shadow-sm">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center gap-2 fw-bold">
                @if ($logoPath)
                    <img src="{{ $logoPath }}" alt="Logo" class="rounded-circle bg-white p-1 object-fit-contain" width="40" height="40">
                @else
                    <div class="rounded-circle bg-white text-custom-purple d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="bi bi-building"></i>
                    </div>
                @endif
                <span>{{ $profilesekolah->nama_sekolah ?? 'SMPN 1 Sukarame' }}</span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
    <li class="nav-item">
        <a class="nav-link {{ request()->url() === url('/') && !request()->has('page') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('landingPage.semua_profil') ? 'active' : '' }}" href="{{ route('landingPage.semua_profil') }}">Profil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('landingPage.semua_guru') ? 'active' : '' }}" href="{{ route('landingPage.semua_guru') }}">Guru</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('landingPage.semua_ekstrakulikuler') ? 'active' : '' }}" href="{{ route('landingPage.semua_ekstrakulikuler') }}">Ekstrakurikuler</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('landingPage.semua_galeri') ? 'active' : '' }}" href="{{ route('landingPage.semua_galeri') }}">Galeri</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('landingPage.semua_berita') ? 'active' : '' }}" href="{{ route('landingPage.semua_berita') }}">Berita</a>
    </li>
</ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-dark text-white py-5" id="kontak">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-5">
                    <h5 class="fw-bold mb-3">{{ $profilesekolah->nama_sekolah ?? 'SMPN 1 Sukarame' }}</h5>
                    <p class="text-white-50 small">{{ $profilesekolah->deskripsi ?? 'Website informasi resmi sekolah.' }}</p>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Navigasi</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-white-50 small">
                        <li><a href="#beranda" class="text-decoration-none text-white-50">Beranda</a></li>
                        <li><a href="#profil" class="text-decoration-none text-white-50">Tentang</a></li>
                        <li><a href="#guru" class="text-decoration-none text-white-50">Guru & Staff</a></li>
                        <li><a href="#ekstrakurikuler" class="text-decoration-none text-white-50">Ekstrakurikuler</a></li>
                        <li><a href="#galeri" class="text-decoration-none text-white-50">Galeri</a></li>
                        <li><a href="#berita" class="text-decoration-none text-white-50">Berita</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Kontak</h5>
                    <p class="text-white-50 small mb-2"><i class="bi bi-geo-alt me-2"></i> {{ $profilesekolah->alamat ?? '-' }}</p>
                    <p class="text-white-50 small mb-0"><i class="bi bi-telephone me-2"></i> {{ $profilesekolah->kontak ?? '-' }}</p>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center text-white-50 small">
                &copy; {{ date('Y') }} {{ $profilesekolah->nama_sekolah ?? 'SMPN 1 Sukarame' }}. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
