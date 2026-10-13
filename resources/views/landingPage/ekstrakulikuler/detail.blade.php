@extends('layouts.template_landing')

@section('content')
    <div class="container py-5" style="margin-top: 70px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white" data-aos="fade-up">
                    <img src="{{ asset('storage/' . ltrim($ekskul->gambar, '/')) }}"
                         alt="{{ $ekskul->nama_ekskul }}" class="w-100 object-fit-cover" style="max-height: 450px;">

                    <div class="card-body p-4 p-md-5">
                        <h2 class="fw-bold text-dark mb-3">{{ $ekskul->nama_ekskul }}</h2>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted d-block fw-semibold mb-1"><i class="bi bi-person-badge me-1"></i> Pembina</small>
                                    <span class="text-dark fw-bold">{{ $ekskul->pembina }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <small class="text-muted d-block fw-semibold mb-1"><i class="bi bi-calendar-event me-1"></i> Jadwal Latihan</small>
                                    <span class="text-dark fw-bold">{{ $ekskul->jadwal_latihan }}</span>
                                </div>
                            </div>
                        </div>

                        <hr class="text-muted opacity-25 mb-4">
                        <small class="text-muted d-block fw-semibold mb-1 fw-bold"> Deskripsi</small>
                        <p class="text-muted lh-lg" style="white-space: pre-line;">
                            {{ $ekskul->deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
