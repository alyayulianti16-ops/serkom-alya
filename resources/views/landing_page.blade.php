<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $profilesekolah->nama_sekolah ?? 'SMPN 1 Sukarame' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8f9fc;
            color: #1f2937;
        }

        .navbar-custom {
            position: relative;
            width: 100%;
            background: #7c3aed;
            z-index: 1000;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.12);
        }

        .navbar-container {
            min-height: 72px;
        }

        .brand {
            color: white !important;
            text-decoration: none;
            font-size: 19px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: white;
            padding: 3px;
            object-fit: contain;
            display: block;
        }

        .brand-fallback {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: white;
            color: #7c3aed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .navbar-nav {
            align-items: center;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.78) !important;
            font-size: 14px;
            font-weight: 500;
            padding: 10px 12px !important;
            transition: 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white !important;
        }

        .dashboard-btn {
            background: white;
            color: #7c3aed;
            border: none;
            border-radius: 7px;
            padding: 9px 15px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .dashboard-btn:hover {
            background: #f3f0ff;
            color: #6d28d9;
        }

        .navbar-toggler {
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            filter: brightness(0) invert(1);
        }

        .hero {
            position: relative;
            min-height: 570px;
            overflow: hidden;
            background: #4c1d95;
        }

        .hero-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg,
                    rgba(35, 15, 65, 0.42) 0%,
                    rgba(61, 28, 104, 0.25) 45%,
                    rgba(0, 0, 0, 0.06) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            min-height: 570px;
            display: flex;
            align-items: center;
        }

        .hero-inner {
            max-width: 760px;
            padding: 70px 0;
        }

        .badge-school {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #fbbf24;
            color: #1f2937;
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero h1 {
            color: white;
            font-size: clamp(40px, 5vw, 65px);
            font-weight: 800;
            line-height: 1.08;
            margin-bottom: 20px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .hero-description {
            color: white;
            font-size: 16px;
            line-height: 1.7;
            max-width: 680px;
            margin-bottom: 28px;
            text-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-yellow {
            background: #fbbf24;
            color: #111827;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-yellow:hover {
            background: #f59e0b;
            color: #111827;
        }

        .btn-white-outline {
            background: rgba(255, 255, 255, 0.08);
            color: white;
            border: 1px solid white;
            padding: 11px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-white-outline:hover {
            background: white;
            color: #7c3aed;
        }

        .section {
            padding: 75px 0;
        }

        .section-title {
            text-align: center;
            font-size: 32px;
            font-weight: 800;
            color: #172033;
            margin-bottom: 10px;
        }

        .section-subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 40px;
        }

        .info-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #eee;
            transition: 0.25s;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.1);
        }

        .info-icon {
            width: 50px;
            height: 50px;
            border-radius: 13px;
            background: #ede9fe;
            color: #7c3aed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 18px;
        }

        .info-card h5 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .info-card p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 8px;
        }

        .teacher-card {
            background: white;
            border-radius: 16px;
            padding: 28px 20px;
            height: 100%;
            text-align: center;
            border: 1px solid #eee;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: 0.25s;
        }

        .teacher-card:hover {
            transform: translateY(-5px);
        }

        .teacher-image {
            width: 115px;
            height: 115px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #ede9fe;
            margin-bottom: 15px;
        }

        .teacher-placeholder {
            width: 115px;
            height: 115px;
            border-radius: 50%;
            background: #ede9fe;
            color: #7c3aed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
            margin: 0 auto 15px;
        }

        .teacher-name {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .teacher-mapel {
            color: #7c3aed;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .teacher-nip {
            color: #9ca3af;
            font-size: 12px;
        }

        .content-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            height: 100%;
            border: 1px solid #eee;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: 0.25s;
        }

        .content-card:hover {
            transform: translateY(-5px);
        }

        .content-image {
            width: 100%;
            height: 210px;
            object-fit: cover;
            display: block;
        }

        .content-placeholder {
            width: 100%;
            height: 210px;
            background: #ede9fe;
            color: #7c3aed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
        }

        .content-body {
            padding: 23px;
        }

        .content-body h5 {
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .content-body p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer {
            background: #17111f;
            color: white;
            padding: 55px 0 25px;
        }

        .footer h5 {
            font-weight: 700;
            margin-bottom: 18px;
        }

        .footer p,
        .footer a {
            color: rgba(255, 255, 255, 0.62);
            font-size: 14px;
            line-height: 1.7;
        }

        .footer a {
            text-decoration: none;
        }

        .footer a:hover {
            color: white;
        }

        @media (max-width: 991px) {
            .navbar-nav {
                align-items: flex-start;
                padding: 12px 0;
            }

            .nav-link {
                padding: 9px 0 !important;
            }

            .dashboard-btn {
                margin-top: 8px;
                margin-bottom: 8px;
            }

            .hero {
                min-height: 560px;
            }

            .hero-content {
                min-height: 560px;
            }
        }

        @media (max-width: 576px) {
            .navbar-container {
                min-height: 64px;
            }

            .brand {
                font-size: 15px;
            }

            .brand-logo,
            .brand-fallback {
                width: 38px;
                height: 38px;
            }

            .hero {
                min-height: 600px;
            }

            .hero-content {
                min-height: 600px;
            }

            .hero-inner {
                padding: 50px 0;
            }

            .hero h1 {
                font-size: 39px;
            }

            .hero-description {
                font-size: 14px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-yellow,
            .btn-white-outline {
                width: 100%;
                text-align: center;
            }

            .section {
                padding: 55px 0;
            }

            .section-title {
                font-size: 27px;
            }

            .info-card {
                padding: 24px;
            }
        }
    </style>
</head>

<body>

    @php
        $logoPath = null;
        $fotoPath = null;

        if ($profilesekolah && $profilesekolah->logo) {
            $logo = ltrim($profilesekolah->logo, '/');

            if (str_starts_with($logo, 'profil/')) {
                $logoPath = asset('storage/' . $logo);
            } else {
                $logoPath = asset('storage/profil/' . $logo);
            }
        }

        if ($profilesekolah && $profilesekolah->foto) {
            $foto = ltrim($profilesekolah->foto, '/');

            if (str_starts_with($foto, 'profil/')) {
                $fotoPath = asset('storage/' . $foto);
            } else {
                $fotoPath = asset('storage/profil/' . $foto);
            }
        }
    @endphp

    <nav class="navbar-custom">

        <div class="container navbar-container d-flex align-items-center">

            <a href="{{ url('/') }}" class="brand">

                @if ($logoPath)
                    <img src="{{ $logoPath }}" alt="Logo Sekolah" class="brand-logo">
                @else
                    <div class="brand-fallback">
                        <i class="bi bi-building"></i>
                    </div>
                @endif

                <span>
                    {{ $profilesekolah->nama_sekolah ?? 'SMPN 1 Sukarame' }}
                </span>

            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="#beranda">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#profil">Tentang</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#guru">Guru & Staf</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#ekstrakurikuler">Ekstrakurikuler</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>

                    <li class="nav-item ms-lg-2">

                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="dashboard-btn">
                                <i class="bi bi-speedometer2"></i>
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="dashboard-btn">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Login Admin
                            </a>
                        @endauth

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <section class="hero" id="beranda">

        @if ($fotoPath)
            <img src="{{ $fotoPath }}" alt="Foto Sekolah" class="hero-image">
        @else
            <div class="hero-image" style="background: linear-gradient(135deg,#6d28d9,#9333ea);"></div>
        @endif

        <div class="hero-overlay"></div>

        <div class="container hero-content">

            <div class="hero-inner">

                <span class="badge-school">
                    <i class="bi bi-star-fill"></i>
                    Terakreditasi
                </span>

                <h1>
                    Tempat Tumbuh Bakat dan Prestasi
                </h1>

                <p class="hero-description">
                    {{ $profilesekolah->deskripsi ?? 'Mewujudkan pendidikan berkualitas untuk membentuk generasi yang berprestasi, berkarakter, dan siap menghadapi masa depan.' }}
                </p>

                <div class="hero-buttons">

                    <a href="#profil" class="btn-yellow">
                        <i class="bi bi-building me-2"></i>
                        Tentang Kami
                    </a>

                    <a href="#berita" class="btn-white-outline">
                        <i class="bi bi-newspaper me-2"></i>
                        Berita Terbaru
                    </a>

                </div>

            </div>

        </div>

    </section>


    <section class="section" id="profil">

        <div class="container">

            <h2 class="section-title">
                Tentang Sekolah
            </h2>

            <p class="section-subtitle">
                Mengenal lebih dekat sekolah kami
            </p>

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="info-card">

                        <div class="info-icon">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>

                        <h5>Tentang Sekolah</h5>

                        <p>
                            <strong>NPSN:</strong>
                            {{ $profilesekolah->npsn ?? '-' }}
                        </p>

                        <p>
                            <strong>Kepala Sekolah:</strong>
                            {{ $profilesekolah->kepala_sekolah ?? '-' }}
                        </p>

                        <p>
                            <strong>Tahun Berdiri:</strong>
                            {{ $profilesekolah->tahun_berdiri ?? '-' }}
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="info-card">

                        <div class="info-icon">
                            <i class="bi bi-flag-fill"></i>
                        </div>

                        <h5>Visi & Misi</h5>

                        <p style="white-space: pre-line;">
                            {{ $profilesekolah->visi_misi ?? '-' }}
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="info-card" id="kontak">

                        <div class="info-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>

                        <h5>Alamat & Kontak</h5>

                        <p>
                            {{ $profilesekolah->alamat ?? '-' }}
                        </p>

                        <p>
                            <strong>Kontak:</strong>
                            {{ $profilesekolah->kontak ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <section class="section bg-white" id="guru">

        <div class="container">

            <h2 class="section-title">
                Daftar Guru & Staff
            </h2>

            <p class="section-subtitle">
                Tenaga pendidik profesional yang berdedikasi di sekolah kami.
            </p>

            <div class="row g-4">

                @forelse($gurus ?? [] as $guru)
                    <div class="col-12 col-sm-6 col-lg-3">

                        <div class="teacher-card">

                            @if ($guru->foto)
                                <img src="{{ asset('storage/' . ltrim($guru->foto, '/')) }}"
                                    alt="{{ $guru->nama_guru }}" class="teacher-image">
                            @else
                                <div class="teacher-placeholder">
                                    <i class="bi bi-person"></i>
                                </div>
                            @endif

                            <div class="teacher-name">
                                {{ $guru->nama_guru }}
                            </div>

                            <div class="teacher-mapel">
                                {{ $guru->mapel ?? '-' }}
                            </div>

                            <div class="teacher-nip">
                                NIP: {{ $guru->nip ?? '-' }}
                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">
                        <p class="text-center text-muted">
                            Belum ada data guru.
                        </p>
                    </div>
                @endforelse

            </div>

        </div>

    </section>


    <section class="section" id="ekstrakurikuler">

        <div class="container">

            <h2 class="section-title">
                Ekstrakurikuler
            </h2>

            <p class="section-subtitle">
                Kegiatan untuk mengembangkan bakat dan minat siswa.
            </p>

            <div class="row g-4">

                @forelse($ekstrakurikulers ?? [] as $ekskul)
                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="content-card">

                            @if ($ekskul->gambar)
                                <img src="{{ asset('storage/' . ltrim($ekskul->gambar, '/')) }}"
                                    alt="{{ $ekskul->nama_ekskul }}" class="content-image">
                            @else
                                <div class="content-placeholder">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif

                            <div class="content-body">

                                <h5>
                                    {{ $ekskul->nama_ekskul }}
                                </h5>

                                <p class="mb-0">
                                    {{ $ekskul->deskripsi }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">
                        <p class="text-center text-muted">
                            Belum ada data ekstrakurikuler.
                        </p>
                    </div>
                @endforelse

            </div>

        </div>

    </section>


    <section class="section bg-white" id="berita">

        <div class="container">

            <h2 class="section-title">
                Berita & Pengumuman
            </h2>

            <p class="section-subtitle">
                Informasi terbaru seputar kegiatan sekolah.
            </p>

            <div class="row g-4">

                @forelse($beritas ?? [] as $berita)
                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="content-card">

                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . ltrim($berita->gambar, '/')) }}"
                                    alt="{{ $berita->judul }}" class="content-image">
                            @else
                                <div class="content-placeholder">
                                    <i class="bi bi-newspaper"></i>
                                </div>
                            @endif

                            <div class="content-body">

                                <small class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}
                                </small>

                                <h5 class="mt-2">
                                    {{ $berita->judul }}
                                </h5>

                                <p class="mb-0">
                                    {{ Str::limit($berita->isi, 120) }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">
                        <p class="text-center text-muted">
                            Belum ada berita.
                        </p>
                    </div>
                @endforelse

            </div>

        </div>

    </section>


    <footer class="footer">

        <div class="container">

            <div class="row g-5">

                <div class="col-md-5">

                    <h5>
                        {{ $profilesekolah->nama_sekolah ?? 'SMPN 1 Sukarame' }}
                    </h5>

                    <p>
                        {{ $profilesekolah->deskripsi ?? 'Website informasi resmi sekolah.' }}
                    </p>

                </div>

                <div class="col-md-3">

                    <h5>Navigasi</h5>

                    <div class="d-flex flex-column gap-2">

                        <a href="#beranda">Beranda</a>
                        <a href="#profil">Tentang</a>
                        <a href="#guru">Guru & Staff</a>
                        <a href="#ekstrakurikuler">Ekstrakurikuler</a>
                        <a href="#berita">Berita</a>

                    </div>

                </div>

                <div class="col-md-4">

                    <h5>Kontak</h5>

                    <p>
                        <i class="bi bi-geo-alt me-2"></i>
                        {{ $profilesekolah->alamat ?? '-' }}
                    </p>

                    <p>
                        <i class="bi bi-telephone me-2"></i>
                        {{ $profilesekolah->kontak ?? '-' }}
                    </p>

                </div>

            </div>

            <hr class="border-secondary my-4">

            <div class="text-center">

                <small>
                    © {{ date('Y') }}
                    {{ $profilesekolah->nama_sekolah ?? 'SMPN 1 Sukarame' }}
                </small>

            </div>

        </div>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
