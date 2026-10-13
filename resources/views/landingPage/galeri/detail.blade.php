@extends('layouts.template_landing')

@section('content')
    <div class="container py-5" style="margin-top: 70px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white" data-aos="fade-up">
                    @if (preg_match('/\.(mp4|mkv|webm)$/i', $galeri->file) || $galeri->kategori === 'video')
                        <video class="w-100 object-fit-cover" style="max-height: 450px;" controls>
                            <source src="{{ asset('storage/' . ltrim($galeri->file, '/')) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    @else
                        <img src="{{ asset('storage/' . ltrim($galeri->file, '/')) }}"
                             alt="{{ $galeri->judul }}" class="w-100 object-fit-cover" style="max-height: 450px;">
                    @endif

                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-secondary text-uppercase px-3 py-2">{{ $galeri->kategori }}</span>
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $galeri->tanggal ? \Carbon\Carbon::parse($galeri->tanggal)->format('d M Y') : '-' }}
                            </small>
                        </div>

                        <h2 class="fw-bold text-dark mb-3">{{ $galeri->judul }}</h2>

                        <hr class="text-muted opacity-25 mb-4">

                        <p class="text-muted lh-lg" style="white-space: pre-line;">
                            {{ $galeri->keterangan ?? 'Tidak ada keterangan tambahan untuk kegiatan ini.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
