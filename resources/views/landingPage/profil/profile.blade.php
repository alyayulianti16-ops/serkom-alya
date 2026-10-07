@extends('layouts.template_landing')

@section('content')

    <div class="bg-light py-5 mb-4 text-center" style="margin-top: 70px;" data-aos="fade-down">
        <div class="container">
            <h1 class="fw-bold text-dark">Profil Sekolah</h1>
            <p class="text-muted mb-0">Informasi lengkap mengenai profil, identitas, dan visi-misi sekolah kami.</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row g-4 align-items-center mb-5">
            <div class="col-12 col-lg-5 text-center" data-aos="fade-right">
                <img src="{{ $kepsekFotoPath }}" alt="{{ $profilesekolah->nama_sekolah }}" class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover" style="max-height: 350px;">
            </div>

            <div class="col-12 col-lg-7" data-aos="fade-left">
                <div class="card card-hover border-0 shadow-sm rounded-4 p-4 bg-white">
                    <h3 class="fw-bold text-dark mb-3">{{ $profilesekolah->nama_sekolah }}</h3>
                    <p class="text-muted mb-4">{{ $profilesekolah->deskripsi }}</p>

                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><strong><i class="bi bi-hash me-2 text-primary"></i>NPSN:</strong> {{ $profilesekolah->npsn }}</li>
                        <li class="mb-2"><strong><i class="bi bi-person-badge me-2 text-primary"></i>Kepala Sekolah:</strong> {{ $profilesekolah->kepala_sekolah }}</li>
                        <li class="mb-2"><strong><i class="bi bi-calendar-event me-2 text-primary"></i>Tahun Berdiri:</strong> {{ $profilesekolah->tahun_berdiri }}</li>
                        <li class="mb-2"><strong><i class="bi bi-geo-alt me-2 text-primary"></i>Alamat:</strong> {{ $profilesekolah->alamat }}</li>
                        <li class="mb-0"><strong><i class="bi bi-telephone me-2 text-primary"></i>Kontak:</strong> {{ $profilesekolah->kontak }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card card-hover border-0 shadow-sm rounded-4 p-4 bg-white mb-4" data-aos="fade-up">
            <h4 class="fw-bold text-dark mb-3"><i class="bi bi-eye me-2 text-primary"></i>Visi & Misi</h4>
            <div class="text-muted">
                {!! nl2br(e($profilesekolah->visi_misi)) !!}
            </div>
        </div>
    </div>
@endsection
