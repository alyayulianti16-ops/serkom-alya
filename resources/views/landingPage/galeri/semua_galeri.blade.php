@extends('layouts.template_landing')

@section('content')
    <div class="bg-light py-5 mb-4 text-center" style="margin-top: 70px;" data-aos="fade-down">
        <div class="container">
            <h1 class="fw-bold text-dark">Galeri Kegiatan Sekolah</h1>
            <p class="text-muted mb-0">Dokumentasi foto dan video kegiatan di lingkungan sekolah kami.</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row g-4">
            @foreach($galeris as $galeri)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-hover border-0 shadow-sm h-100 rounded-4 overflow-hidden bg-white" data-aos="fade-up">
                        @if (preg_match('/\.(mp4|mkv|webm)$/i', $galeri->file))
                            <video class="card-img-top object-fit-cover" style="height: 220px;" controls>
                                <source src="{{ asset('storage/' . ltrim($galeri->file, '/')) }}" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                        @else
                            <img src="{{ asset('storage/' . ltrim($galeri->file, '/')) }}"
                                 alt="{{ $galeri->judul }}" class="card-img-top object-fit-cover" style="height: 220px;">
                        @endif

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <span class="badge bg-secondary mb-2">{{ $galeri->kategori ?? 'Umum' }}</span>
                                <h5 class="fw-bold mb-2 text-dark">{{ $galeri->judul }}</h5>
                                <p class="text-muted small mb-0">{{ $galeri->keterangan ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
