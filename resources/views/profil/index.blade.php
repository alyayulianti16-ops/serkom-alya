@extends('layouts.template')

@section('content')
<div class="container-fluid px-0">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center border-bottom">
            <h6 class="card-title mb-0 fw-bold text-dark">
                <i class="bi bi-building me-2 text-dark"></i>Profil Sekolah
            </h6>
            <a href="{{ route('profile_sekolah.edit') }}" class="btn btn-primary btn-sm px-3 fw-semibold">
                <i class="bi bi-pencil-square me-1"></i> Edit Profil
            </a>
        </div>

        <div class="card-body p-4">
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="border rounded p-3 text-center h-100 bg-light d-flex flex-column justify-content-center align-items-center">
                        <span class="d-block text-dark small fw-bold text-uppercase mb-3">Logo Sekolah</span>
                        @if($profil && $profil->logo)
                            <img src="{{ asset('storage/profil/' . $profil->logo) }}" class="img-fluid rounded" style="max-height: 180px; object-fit: contain;">
                        @else
                            <div class="text-dark small py-3">
                                <i class="bi bi-image fs-1 d-block mb-2 text-dark"></i>
                                Belum ada logo
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="border rounded p-3 text-center h-100 bg-light d-flex flex-column justify-content-center align-items-center">
                        <span class="d-block text-dark small fw-bold text-uppercase mb-3">Foto Gedung Utama</span>
                        @if($profil && $profil->foto)
                            <img src="{{ asset('storage/profil/' . $profil->foto) }}" class="img-fluid rounded shadow-sm" style="max-height: 200px; width: 100%; object-fit: cover;">
                        @else
                            <div class="text-dark small py-3">
                                <i class="bi bi-card-image fs-1 d-block mb-2 text-dark"></i>
                                Belum ada foto gedung
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <tbody>
                        <tr>
                            <td class="text-dark fw-semibold ps-0" style="width: 220px;">Nama Sekolah</td>
                            <td class="fw-bold text-dark">: {{ $profil->nama_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-dark fw-semibold ps-0">Kepala Sekolah</td>
                            <td class="text-dark">: {{ $profil->kepala_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-dark fw-semibold ps-0">NPSN</td>
                            <td class="text-dark">: {{ $profil->npsn ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-dark fw-semibold ps-0">Kontak / No. Telp</td>
                            <td class="text-dark">: {{ $profil->kontak ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-dark fw-semibold ps-0">Tahun Berdiri</td>
                            <td class="text-dark">: {{ $profil->tahun_berdiri ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-dark fw-semibold ps-0">Alamat Lengkap</td>
                            <td class="text-dark">: {{ $profil->alamat ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr class="my-4 text-dark opacity-25">

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded h-100">
                        <span class="d-block text-dark small fw-bold text-uppercase mb-2">Visi & Misi</span>
                        <p class="mb-0 text-dark small" style="white-space: pre-line; line-height: 1.6;">{{ $profil->visi_misi ?? '-' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded h-100">
                        <span class="d-block text-dark small fw-bold text-uppercase mb-2">Deskripsi Singkat</span>
                        <p class="mb-0 text-dark small" style="white-space: pre-line; line-height: 1.6;">{{ $profil->deskripsi ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection