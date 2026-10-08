@extends('layouts.template_landing')

@section('content')
    <section id="beranda" class="position-relative text-white py-5 bg-dark" style="min-height: 480px;">
        <img src="{{ $fotoPath }}" alt="Foto Sekolah" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>
        <div class="container position-relative py-5 text-center d-flex flex-column align-items-center justify-content-center"
            style="min-height: 380px;">
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm" data-aos="fade-down">
                <i class="bi bi-star-fill"></i> Terakreditasi
            </span>
            <h1 class="fw-bold display-5 mb-3 text-white" data-aos="fade-up">Tempat Tumbuh Bakat dan Prestasi</h1>
            <p class="lead text-white-50 mb-4" style="max-width: 700px;" data-aos="fade-up">
                {{ $profilesekolah->deskripsi }}
            </p>
            <div class="d-flex gap-2" data-aos="fade-up">
                <a href="#profil" class="btn btn-warning fw-bold px-4 py-2">Tentang Kami</a>
                <a href="#berita" class="btn btn-outline-light fw-semibold px-4 py-2">Berita Terbaru</a>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: -35px; position: relative; z-index: 10;" data-aos="fade-up">
        <div class="card card-hover border-0 shadow-lg rounded-4 bg-custom-purple text-white p-3">
            <div class="row text-center py-2">
                <div class="col-6 col-md-3 border-end border-light border-opacity-25 py-2">
                    <h3 class="fw-bold display-6 mb-1">A</h3>
                    <p class="text-white-50 small mb-0 fw-semibold">Akreditasi</p>
                </div>
                <div class="col-6 col-md-3 border-end border-light border-opacity-25 py-2">
                    <h3 class="fw-bold display-6 mb-1">{{ $totalSiswa }}</h3>
                    <p class="text-white-50 small mb-0 fw-semibold">Jumlah Siswa</p>
                </div>
                <div class="col-6 col-md-3 border-end border-light border-opacity-25 py-2">
                    <h3 class="fw-bold display-6 mb-1">{{ $totalGuru }}</h3>
                    <p class="text-white-50 small mb-0 fw-semibold">Jumlah Guru</p>
                </div>
                <div class="col-6 col-md-3 py-2">
                    <h3 class="fw-bold display-6 mb-1">{{ $totalEskul }}</h3>
                    <p class="text-white-50 small mb-0 fw-semibold">Ekstrakurikuler</p>
                </div>
            </div>
        </div>
    </div>

    <section id="profil" class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold text-dark">Tentang Sekolah</h2>
                <p class="text-muted">Mengenal lebih dekat profil dan sambutan kepala sekolah</p>
            </div>

            <div class="card card-hover border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white mb-4" data-aos="fade-up">
                <div class="row align-items-center g-4">
                    <div class="col-md-4 text-center">
                        <img src="{{ $kepsekFotoPath }}" alt="Kepala Sekolah" class="img-fluid rounded-4 shadow-sm w-100"
                            style="max-height: 260px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <h3 class="fw-bold mb-3">Sambutan Kepala Sekolah</h3>
                        <p class="text-muted" style="line-height: 1.8;">
                            "Selamat datang di website resmi sekolah kami.

                            Website ini kami hadirkan sebagai sarana informasi dan komunikasi bagi siswa, orang tua, serta
                            masyarakat luas untuk mengenal lebih dekat profil, program, dan berbagai kegiatan di sekolah.
                            Kami berkomitmen untuk terus memberikan pelayanan pendidikan terbaik guna mencetak generasi yang
                            berprestasi dan berkarakter.

                            Terima kasih atas kepercayaan dan dukungan Anda kepada sekolah kami."
                        </p>
                        <h5 class="fw-bold mb-0 text-dark mt-4">{{ $profilesekolah->kepala_sekolah }}</h5>
                        <small class="text-muted">Kepala Sekolah</small>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="card card-hover border-0 shadow-sm p-4 rounded-4 bg-white h-100">
                        <h4 class="fw-bold h5 mb-3">Informasi Sekolah</h4>
                        <ul class="list-unstyled text-muted small d-flex flex-column gap-2 mb-0">
                            <li><strong>NPSN:</strong> {{ $profilesekolah->npsn }}</li>
                            <li><strong>Kepala Sekolah:</strong> {{ $profilesekolah->kepala_sekolah }}</li>
                            <li><strong>Tahun Berdiri:</strong> {{ $profilesekolah->tahun_berdiri }}</li>
                            <li><strong>Alamat:</strong> {{ $profilesekolah->alamat }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="card card-hover border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                        <h4 class="fw-bold text-dark mb-3"><i class="bi bi-eye me-2 text-primary"></i>Visi & Misi</h4>
                        <div class="text-muted">{!! nl2br(e($profilesekolah->visi_misi)) !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="berita" class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold text-dark">Berita Terbaru</h2>
                <p class="text-muted">Informasi terbaru seputar sekolah</p>
            </div>
            <div class="row g-4">
                @foreach ($beritas as $berita)
                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
                        <div
                            class="card card-hover border-0 shadow-sm h-100 rounded-4 overflow-hidden bg-white d-flex flex-column">
                            <img src="{{ asset('storage/' . ltrim($berita->gambar, '/')) }}" alt="Berita"
                                class="card-img-top object-fit-cover" style="height: 190px;">
                            <div class="card-body p-4 d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <small class="text-muted mb-2 d-block">
                                        <i class="bi bi-calendar3 me-1"></i> {{ $berita->created_at?->format('d M Y') }}
                                    </small>
                                    <h5 class="fw-bold h6 mb-2 text-dark">{{ $berita->judul }}</h5>
                                    <p class="text-muted small mb-3">{{ Str::limit($berita->isi, 90) }}</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('landingPage.berita.detail', encrypt($berita->id ?? $berita->id_berita)) }}"
                                        class="text-decoration-none fw-bold text-custom-purple d-inline-flex align-items-center small">
                                        Lihat Detailnya <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('landingPage.berita.semua_berita') }}"
                    class="btn text-white fw-bold px-4 py-2 rounded-pill bg-custom-purple shadow-sm">
                    Lihat Berita Lainnyanya <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    <section id="guru" class="py-5 bg-white border-top">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold text-dark">Daftar Guru & Staff</h2>
                <p class="text-muted">Tenaga pendidik profesional di sekolah kami</p>
            </div>
            <div class="row g-4">
                @foreach ($gurus as $guru)
                    <div class="col-12 col-sm-6 col-lg-3" data-aos="fade-up">
                        <div
                            class="card card-hover border-0 shadow-sm h-100 text-center p-4 rounded-4 bg-light d-flex flex-column align-items-center justify-content-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center p-0 w-100">
                                <img src="{{ asset('storage/' . ltrim($guru->foto, '/')) }}" alt="Foto"
                                    class="rounded-circle mb-3 shadow-sm object-fit-cover" width="90" height="90">
                                <h5 class="fw-bold fs-6 mb-1 text-dark">{{ $guru->nama_guru }}</h5>
                                <p class="text-custom-purple fw-semibold small mb-1">{{ $guru->mapel }}</p>
                                <small class="text-muted mt-auto mb-2">NIP: {{ $guru->nip }}</small>
                                <a href="{{ route('landingPage.guru.detail', encrypt($guru->id_guru)) }}"
                                    class="text-decoration-none fw-bold text-custom-purple d-inline-flex align-items-center small mt-2">
                                    Lihat Detailnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('landingPage.guru.semua_guru') }}"
                        class="btn text-white fw-bold px-4 py-2 bg-custom-purple rounded-pill shadow-sm ">
                        Guru Lainnya <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="ekstrakurikuler" class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold text-dark">Ekstrakurikuler</h2>
                <p class="text-muted">Wadah pengembangan bakat dan minat siswa</p>
            </div>
            <div class="row g-4">
                @foreach ($ekstrakurikulers as $ekskul)
                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
                        <div
                            class="card card-hover border-0 shadow-sm h-100 rounded-4 overflow-hidden bg-white d-flex flex-column">
                            <img src="{{ asset('storage/' . ltrim($ekskul->gambar, '/')) }}" alt="Ekskul"
                                class="card-img-top object-fit-cover" style="height: 190px;">
                            <div class="card-body p-4 d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <h5 class="fw-bold h6 mb-2 text-dark">{{ $ekskul->nama_ekskul }}</h5>
                                    <p class="text-muted small mb-3">{{ Str::limit($ekskul->deskripsi, 100) }}</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('landingPage.ekskul.detail', encrypt( $ekskul->getKey())) }}"
                                        class="text-decoration-none fw-bold text-custom-purple d-inline-flex align-items-center small">
                                        Lihat Detailnya <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('landingPage.ekskul.semua_ekskul') }}"
                        class="btn text-white fw-bold px-4 py-2 rounded-pill bg-custom-purple shadow-sm">
                        Lihat Ekskul Lainnya <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="galeri" class="py-5 bg-white border-top">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold text-dark">Galeri Foto Kegiatan</h2>
                <p class="text-muted">Dokumentasi momen aktivitas di sekolah</p>
            </div>
            <div class="row g-4">
                @foreach ($galeris as $galeri)
                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
                        <div
                            class="card card-hover border-0 shadow-sm h-100 rounded-4 overflow-hidden bg-white d-flex flex-column">
                            @if (preg_match('/\.(mp4|mkv|webm)$/i', $galeri->file))
                                <video src="{{ asset('storage/' . $galeri->file) }}" controls
                                    class="card-img-top object-fit-cover" style="height: 190px;"></video>
                            @else
                                <img src="{{ asset('storage/' . $galeri->file) }}" alt="Galeri"
                                    class="card-img-top object-fit-cover" style="height: 190px;">
                            @endif
                            <div class="card-body p-4 d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <small class="text-muted mb-2 d-block">
                                        <i class="bi bi-calendar3 me-1"></i> {{ $galeri->created_at?->format('d M Y') }}
                                    </small>
                                    <h5 class="fw-bold h6 mb-2 text-dark">{{ $galeri->judul }}</h5>
                                    <p class="text-muted small mb-3">{{ Str::limit($galeri->keterangan, 90) }}</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('landingPage.galeri.detail', encrypt($galeri->id ?? $galeri->id_galeri)) }}"
                                        class="text-decoration-none fw-bold text-custom-purple d-inline-flex align-items-center small">
                                        Lihat Detailnya <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('landingPage.galeri.semua_galeri') }}"
                        class="btn text-white fw-bold px-4 py-2 rounded-pill bg-custom-purple shadow-sm">
                        Lihat Galeri Lainnya <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
