@extends('layouts.template_landing')

@section('content')
    <div class="container py-5" style="min-height: 70vh; margin-top: 40px;" data-aos="fade-down">
        <div class="mb-5 text-center">
            <h2 class="fw-bold text-dark">Semua Berita & Pengumuman</h2>
            <p class="text-muted">Daftar lengkap arsip informasi seputar kegiatan sekolah.</p>
        </div>

        <div class="row g-4">
            @foreach($beritas as $berita)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-hover border-0 shadow-sm h-100 rounded-4 overflow-hidden" data-aos="fade-up">
                        <img src="{{ asset('storage/' . ltrim($berita->gambar, '/')) }}"
                             alt="{{ $berita->judul }}" class="card-img-top" style="height: 200px; object-fit: cover;">

                        <div class="card-body p-4 d-flex flex-column">
                            <small class="text-muted mb-2">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}
                            </small>
                            <h5 class="card-title fw-bold mb-2">{{ $berita->judul }}</h5>
                            <p class="card-text text-muted small mb-3">{{ Str::limit($berita->isi, 120) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
