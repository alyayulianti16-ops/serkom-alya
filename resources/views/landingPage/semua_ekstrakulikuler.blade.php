@extends('layouts.template_landing')

@section('content')
    <div class="bg-light py-5 mb-4 text-center" style="margin-top: 70px;">
        <div class="container">
            <h1 class="fw-bold text-dark">Semua Ekstrakurikuler</h1>
            <p class="text-muted mb-0">Daftar lengkap kegiatan ekstrakurikuler di sekolah kami.</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row g-4">
            @forelse($ekskuls as $ekskul)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden bg-white">
                        @if (!empty($ekskul->gambar))
                            <img src="{{ asset('storage/' . ltrim($ekskul->gambar, '/')) }}"
                                 alt="{{ $ekskul->nama_ekskul ?? $ekskul->nama }}" class="card-img-top object-fit-cover" style="height: 200px;">
                        @else
                            <div class="card-img-top bg-light text-secondary d-flex align-items-center justify-content-center" style="height: 200px; font-size: 40px;">
                                <i class="bi bi-trophy-fill"></i>
                            </div>
                        @endif

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold mb-2 text-dark">{{ $ekskul->nama_ekskul ?? $ekskul->nama }}</h5>
                                <p class="text-muted small mb-0">{{ $ekskul->deskripsi ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada data ekstrakurikuler yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
