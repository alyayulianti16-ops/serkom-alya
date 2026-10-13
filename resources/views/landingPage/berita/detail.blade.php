@extends('layouts.template_landing')

@section('content')
    <div class="container py-5" style="margin-top: 70px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white" data-aos="fade-up">
                    <img src="{{ asset('storage/' . ltrim($berita->gambar, '/')) }}"
                         alt="{{ $berita->judul }}" class="w-100 object-fit-cover" style="max-height: 450px;">

                    <div class="card-body p-4 p-md-5">
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}
                        </small>
                        <h2 class="fw-bold text-dark mb-3">{{ $berita->judul }}</h2>
                        <hr class="text-muted opacity-25 mb-4">
                        <p class="text-muted lh-lg" style="white-space: pre-line;">
                            {{ $berita->isi ?? 'Tidak ada isi berita.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
