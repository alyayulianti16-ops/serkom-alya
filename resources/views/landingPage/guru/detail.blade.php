@extends('layouts.template_landing')

@section('content')
    <div class="bg-light py-5 mb-4 text-center" style="margin-top: 70px;" data-aos="fade-down">
        <div class="container">
            <h1 class="fw-bold text-dark">Detail Profil Guru</h1>
            <p class="text-muted mb-0">Informasi lengkap tenaga pendidik dan kependidikan.</p>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white text-center p-4 p-md-5" data-aos="fade-up">
                    <div class="card-body">
                        <div class="mb-4">
                            <img src="{{ $guru->foto ? asset('storage/' . ltrim($guru->foto, '/')) : asset('assets/img/default-profile.png') }}"
                                 alt="{{ $guru->nama_guru }}"
                                 class="rounded-circle shadow object-fit-cover"
                                 style="width: 150px; height: 150px;">
                        </div>
                        <h3 class="fw-bold text-dark mb-1">{{ $guru->nama_guru }}</h3>
                        <p class="text-muted fw-semibold mb-4">{{ $guru->mapel ?? 'Guru / Staf' }}</p>
                        <hr class="text-muted opacity-25 my-4">
                        <div class="text-start px-md-3">
                            <div class="row mb-3">
                                <div class="col-4 col-sm-4 fw-semibold text-muted">NIP</div>
                                <div class="col-8 col-sm-8 text-dark fw-medium">: {{ $guru->nip }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 col-sm-4 fw-semibold text-muted">Mata Pelajaran</div>
                                <div class="col-8 col-sm-8 text-dark fw-medium">: {{ $guru->mapel }}</div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="{{ route('landingPage.guru.semua_guru') }}" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-semibold">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Guru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
