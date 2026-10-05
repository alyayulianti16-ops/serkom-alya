@extends('layouts.template')

@section('content')
<div class="card border-0 shadow-sm rounded-3 mb-3">
    <div class="card-body p-3">
        <h5 class="fw-bold mb-0">Selamat Datang, {{ Auth::user()->name ?? Auth::user()->username ?? 'Admin' }}!</h5>
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-lg-3 col-md-4">
        <div class="card bg-secondary-dark text-white rounded-3 shadow-sm mb-0">
            <div class="card-body p-3">
                <p class="mb-1 opacity-75 fw-medium fs-6 text-truncate">Jumlah Guru</p>
                <h2 class="text-white fw-bold mb-0">{{ $totalGuru ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="card bg-primary-dark text-white rounded-3 shadow-sm mb-0">
            <div class="card-body p-3">
                <p class="mb-1 opacity-75 fw-medium fs-6 text-truncate">Jumlah Siswa</p>
                <h2 class="text-white fw-bold mb-0">{{ $totalSiswa ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="card bg-secondary-dark text-white rounded-3 shadow-sm mb-0">
            <div class="card-body p-3">
                <p class="mb-1 opacity-75 fw-medium fs-6 text-truncate">Ekstrakurikuler</p>
                <h2 class="text-white fw-bold mb-0">{{ $totalEskel ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4">
        <div class="card bg-primary-dark text-white rounded-3 shadow-sm mb-0">
            <div class="card-body p-3">
                <p class="mb-1 opacity-75 fw-medium fs-6 text-truncate">Jumlah Berita</p>
                <h2 class="text-white fw-bold mb-0">{{ $totalBerita ?? 0 }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                <h5 class="mb-0 fw-bold">Berita Terbaru</h5>
                <a href="{{ route('berita.index') }}" class="btn btn-sm btn-light-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">Judul</th>
                                <th>Tanggal</th>
                                <th class="text-end pe-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($beritaTerbaru ?? [] as $item)
                            <tr>
                                <td class="ps-3 fw-medium">{{ $item->judul }}</td>
                                <td>{{ date('Y-m-d', strtotime($item->tanggal)) }}</td>
                                <td class="text-end pe-3">
                                    <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-sm btn-light-warning">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">Belum ada berita yang diunggah</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Akses Cepat</h5>
            </div>
            <div class="card-body d-grid gap-2">
                <a href="{{ route('siswa.create') }}" class="btn btn-outline-primary text-start">
                    <i class="ti ti-plus me-1"></i> Tambah Data Siswa
                </a>
                <a href="{{ route('guru.create') }}" class="btn btn-outline-primary text-start">
                    <i class="ti ti-plus me-1"></i> Tambah Data Guru
                </a>
                <a href="{{ route('berita.create') }}" class="btn btn-outline-primary text-start">
                    <i class="ti ti-plus me-1"></i> Tambah Berita Baru
                </a>
                <a href="{{ route('galeri.create') }}" class="btn btn-outline-primary text-start">
                    <i class="ti ti-plus me-1"></i> Upload Galeri
                </a>
            </div>
        </div>
    </div>
</div>
@endsection