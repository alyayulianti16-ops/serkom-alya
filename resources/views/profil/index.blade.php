@extends('layouts.template')

@section('title', 'Profil Sekolah')

@section('content')
<div class="container-fluid px-0">

    <!-- BAGIAN ATAS: GAMBAR (LOGO & FOTO GEDUNG) -->
    <div class="row g-4 mb-4">
        <!-- Logo Sekolah -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom">
                    <h6 class="card-title mb-0 fw-bold text-primary">
                        <i class="bi bi-patch-check me-2"></i>Logo Sekolah
                    </h6>
                </div>
                <div class="card-body text-center d-flex align-items-center justify-content-center p-4">
                    @if(optional($profil)->logo)
                        <img src="{{ asset('storage/profil/' . $profil->logo) }}" class="img-fluid rounded" style="max-height: 180px; object-fit: contain;">
                    @else
                        <div class="text-muted small py-4">
                            <i class="bi bi-image fs-1 d-block mb-2 text-secondary"></i>
                            Belum ada logo
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Foto Gedung / Utama -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom">
                    <h6 class="card-title mb-0 fw-bold text-primary">
                        <i class="bi bi-building-fill me-2"></i>Foto Gedung / Utama
                    </h6>
                </div>
                <div class="card-body text-center d-flex align-items-center justify-content-center p-3">
                    @if(optional($profil)->foto)
                        <img src="{{ asset('storage/profil/' . $profil->foto) }}" class="img-fluid rounded shadow-sm" style="max-height: 220px; width: 100%; object-fit: cover;">
                    @else
                        <div class="text-muted small py-4">
                            <i class="bi bi-card-image fs-1 d-block mb-2 text-secondary"></i>
                            Belum ada foto gedung
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- BAGIAN BAWAH: DATA INFORMASI SEKOLAH -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="card-title mb-0 fw-bold text-primary">
                        <i class="bi bi-info-circle me-2"></i>Informasi Sekolah
                    </h6>
                    <a href="{{ route('profile_sekolah.edit') }}" class="btn btn-primary btn-sm px-3 fw-semibold">
                        <i class="bi bi-pencil-square me-1"></i> Edit Profil
                    </a>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-secondary fw-semibold ps-0" style="width: 220px;">Nama Sekolah</td>
                                    <td class="fw-bold text-dark">: {{ $profil->nama_sekolah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-secondary fw-semibold ps-0">Kepala Sekolah</td>
                                    <td>: {{ $profil->kepala_sekolah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-secondary fw-semibold ps-0">NPSN</td>
                                    <td>: {{ $profil->npsn ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-secondary fw-semibold ps-0">Kontak / No. Telp</td>
                                    <td>: {{ $profil->kontak ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-secondary fw-semibold ps-0">Tahun Berdiri</td>
                                    <td>: {{ $profil->tahun_berdiri ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-secondary fw-semibold ps-0">Alamat Lengkap</td>
                                    <td>: {{ $profil->alamat ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr class="my-4 text-muted opacity-25">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <span class="d-block text-secondary small fw-bold text-uppercase mb-2">Visi & Misi</span>
                                <p class="mb-0 text-dark small" style="white-space: pre-line; line-height: 1.6;">{{ $profil->visi_misi ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <span class="d-block text-secondary small fw-bold text-uppercase mb-2">Deskripsi Singkat</span>
                                <p class="mb-0 text-dark small" style="white-space: pre-line; line-height: 1.6;">{{ $profil->deskripsi ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
