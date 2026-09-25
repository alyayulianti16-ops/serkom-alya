@extends('layouts.template')

@section('title', 'Profil Sekolah')

@section('content')
<div class="container-fluid px-0">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center border-bottom">
                    <h5 class="card-title mb-0 fw-bold text-primary">
                        <i class="bi bi-building me-2"></i>Informasi Sekolah
                    </h5>
                    <a href="{{ route('profile_sekolah.edit') }}" class="btn btn-primary px-3 fw-semibold shadow-sm">
                        <i class="bi bi-pencil-square me-1"></i> Edit Profil
                    </a>
                </div>

                <div class="card-body p-4">
                    <ul class="list-group list-group-flush mb-4">

                        <li class="list-group-item py-3 px-2 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-sm-4 text-muted fw-semibold">
                                    <i class="bi bi-bank me-2 text-primary"></i>Nama Sekolah
                                </div>
                                <div class="col-sm-8 fw-bold text-dark fs-6">
                                    : {{ $profil->nama_sekolah ?? '-' }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item py-3 px-2 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-sm-4 text-muted fw-semibold">
                                    <i class="bi bi-person-badge me-2 text-primary"></i>Kepala Sekolah
                                </div>
                                <div class="col-sm-8 fw-bold text-dark fs-6">
                                    : {{ $profil->kepala_sekolah ?? '-' }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item py-3 px-2 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-sm-4 text-muted fw-semibold">
                                    <i class="bi bi-card-text me-2 text-primary"></i>NPSN
                                </div>
                                <div class="col-sm-8 fw-semibold text-dark">
                                    : {{ $profil->npsn ?? '-' }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item py-3 px-2 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-sm-4 text-muted fw-semibold">
                                    <i class="bi bi-telephone me-2 text-primary"></i>Kontak / No. Telp
                                </div>
                                <div class="col-sm-8 fw-semibold text-dark">
                                    : {{ $profil->kontak ?? '-' }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item py-3 px-2 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-sm-4 text-muted fw-semibold">
                                    <i class="bi bi-calendar-event me-2 text-primary"></i>Tahun Berdiri
                                </div>
                                <div class="col-sm-8 fw-semibold text-dark">
                                    : {{ $profil->tahun_berdiri ?? '-' }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item py-3 px-2 border-0">
                            <div class="row align-items-start">
                                <div class="col-sm-4 text-muted fw-semibold">
                                    <i class="bi bi-geo-alt me-2 text-primary"></i>Alamat Lengkap
                                </div>
                                <div class="col-sm-8 fw-medium text-dark">
                                    : {{ $profil->alamat ?? '-' }}
                                </div>
                            </div>
                        </li>

                    </ul>

                    <hr class="my-4 text-muted opacity-25">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="text-uppercase text-muted fw-bold small d-block mb-2">
                                <i class="bi bi-award-fill text-warning me-1"></i> Visi & Misi
                            </label>
                            <div class="bg-light p-3 rounded text-dark" style="white-space: pre-line; line-height: 1.6; min-height: 120px;">
                                {{ $profil->visi_misi ?? '-' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-uppercase text-muted fw-bold small d-block mb-2">
                                <i class="bi bi-file-text-fill text-primary me-1"></i> Deskripsi Singkat
                            </label>
                            <div class="bg-light p-3 rounded text-dark" style="white-space: pre-line; line-height: 1.6; min-height: 120px;">
                                {{ $profil->deskripsi ?? '-' }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Card Logo -->
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 px-4 border-bottom">
                    <h6 class="card-title mb-0 fw-bold text-primary">
                        <i class="bi bi-patch-check me-2"></i>Logo Sekolah
                    </h6>
                </div>
                <div class="card-body text-center p-4">
                    <div class="d-flex align-items-center justify-content-center bg-light rounded border p-3" style="min-height: 180px;">
                        @if(optional($profil)->logo && file_exists(public_path('storage/profil/' . $profil->logo)))
                            <img src="{{ asset('storage/profil/' . $profil->logo) }}" class="img-fluid rounded" style="max-height: 150px; object-fit: contain;">
                        @else
                            <div class="text-muted small">
                                <i class="bi bi-image fs-1 d-block mb-1 text-secondary"></i>
                                Belum ada logo
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 px-4 border-bottom">
                    <h6 class="card-title mb-0 fw-bold text-primary">
                        <i class="bi bi-building-fill me-2"></i>Foto Gedung / Utama
                    </h6>
                </div>
                <div class="card-body text-center p-4">
                    <div class="d-flex align-items-center justify-content-center bg-light rounded border p-3" style="min-height: 200px;">
                        @if(optional($profil)->foto && file_exists(public_path('storage/profil/' . $profil->foto)))
                            <img src="{{ asset('storage/profil/' . $profil->foto) }}" class="img-fluid rounded shadow-sm" style="max-height: 180px; width: 100%; object-fit: cover;">
                        @else
                            <div class="text-muted small">
                                <i class="bi bi-card-image fs-1 d-block mb-1 text-secondary"></i>
                                Belum ada foto gedung
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
