@extends('layouts.template_landing')

@section('content')
    <div class="bg-light py-5 mb-4 text-center" style="margin-top: 70px;">
        <div class="container">
            <h1 class="fw-bold text-dark">Semua Guru & Staf</h1>
            <p class="text-muted mb-0">Daftar lengkap tenaga pendidik dan kependidikan di sekolah kami.</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row g-4">
            @forelse($gurus as $guru)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden text-center bg-white">
                        @if (!empty($guru->foto))
                            <img src="{{ asset('storage/' . ltrim($guru->foto, '/')) }}"
                                 alt="{{ $guru->nama_guru }}" class="card-img-top object-fit-cover" style="height: 250px;">
                        @else
                            <div class="card-img-top bg-light text-secondary d-flex align-items-center justify-content-center" style="height: 250px; font-size: 50px;">
                                <i class="bi bi-person-fill"></i>
                            </div>
                        @endif

                        <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <h5 class="fw-bold mb-1 text-dark">{{ $guru->nama_guru }}</h5>
                            <p class="text-muted small fw-semibold mb-0">{{ $guru->mapel ?? 'Guru / Staf' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada data guru & staf yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
