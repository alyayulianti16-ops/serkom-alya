@extends('layouts.template_landing')

@section('content')
    <div class="bg-light py-5 mb-4 text-center" style="margin-top: 70px;" data-aos="fade-down">
        <div class="container">
            <h1 class="fw-bold text-dark">Semua Guru & Staf</h1>
            <p class="text-muted mb-0">Daftar lengkap tenaga pendidik dan kependidikan di sekolah kami.</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row g-4">
            @foreach ($gurus as $guru)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-hover border-0 shadow-sm h-100 rounded-4 overflow-hidden text-center bg-white"
                        data-aos="fade-up">
                        <img src="{{ asset('storage/' . ltrim($guru->foto, '/')) }}" alt="{{ $guru->nama_guru }}"
                            class="card-img-top object-fit-cover" style="height: 250px;">

                        <div class="card-body p-4 d-flex flex-column align-items-center text-center justify-content-center"
                            data-aos="fade-up">
                            <h5 class="fw-bold mb-1 text-dark">{{ $guru->nama_guru }}</h5>
                            <p class="text-muted small fw-semibold mb-0">{{ $guru->mapel ?? 'Guru / Staf' }}</p>
                            <small class="text-muted mt-auto">NIP: {{ $guru->nip }}</small>

                            <a href="{{ route('landingPage.guru.detail', encrypt($guru->id_guru ?? $guru->id)) }}"
                                class="text-decoration-none fw-bold text-custom-purple d-inline-flex align-items-center small mt-2">
                                Lihat Detailnya <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
