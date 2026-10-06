@extends('layouts.template_landing')

@section('content')
    <div class="container py-5" style="min-height: 70vh; margin-top: 40px;">
        <div class="mb-5 text-center">
            <h2 class="fw-bold text-dark">Semua Berita & Pengumuman</h2>
            <p class="text-muted">Daftar lengkap arsip informasi seputar kegiatan sekolah.</p>
        </div>

        <div class="row g-4">
            @forelse($beritas as $berita)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . ltrim($berita->gambar, '/')) }}"
                                 alt="{{ $berita->judul }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light text-primary d-flex align-items-center justify-content-center" style="height: 200px; font-size: 45px; background-color: #ede9fe !important;">
                                <i class="bi bi-newspaper"></i>
                            </div>
                        @endif

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
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada berita yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
