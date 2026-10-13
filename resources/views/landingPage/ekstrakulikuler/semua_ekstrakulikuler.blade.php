@extends('layouts.template_landing')

@section('content')
    <div class="bg-light py-5 mb-4 text-center" style="margin-top: 70px;" data-aos="fade-down">
        <div class="container">
            <h1 class="fw-bold text-dark">Semua Ekstrakurikuler</h1>
            <p class="text-muted mb-0">Daftar lengkap kegiatan ekstrakurikuler di sekolah kami.</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row g-4">
            @foreach ($ekskuls as $ekskul)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-hover border-0 shadow-sm h-100 rounded-4 overflow-hidden bg-white d-flex flex-column"
                        data-aos="fade-up">
                        <img src="{{ asset('storage/' . ltrim($ekskul->gambar, '/')) }}"
                            alt="{{ $ekskul->nama_ekskul ?? $ekskul->nama }}" class="card-img-top object-fit-cover"
                            style="height: 200px;">

                        <div class="card-body p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="fw-bold mb-2 text-dark">{{ $ekskul->nama_ekskul ?? $ekskul->nama }}</h5>
                                <p class="text-muted small mb-3">{{ Str::limit($ekskul->deskripsi ?? '', 100) }}</p>
                            </div>
                            <div class="mt-auto">
                                <a href="{{ route('landingPage.ekskul.detail', encrypt($ekskul->id_eskul)) }}"
                                    class="text-decoration-none fw-bold text-custom-purple d-inline-flex align-items-center small">
                                    Lihat Detailnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
