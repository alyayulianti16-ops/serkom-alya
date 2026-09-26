@extends('layouts.template')

@section('title', 'Data Guru')

@section('content')
<div class="container-fluid p-0">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-primary mb-1"><i class="bi bi-person-badge me-2"></i>Data Guru</h4>
            <p class="text-muted mb-0">Kelola data tenaga pendidik sekolah</p>
        </div>
        <a href="{{ route('guru.create') }}" class="btn btn-primary fw-semibold px-3 py-2">
            <i class="bi bi-plus-lg me-1"></i> Tambah Guru
        </a>
    </div>

    <!-- Form Pencarian -->
    <div class="row mb-4">
        <div class="col-md-5">
            <form action="{{ route('guru.index') }}" method="GET">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control border-0" placeholder="Cari NIP, Nama, atau Mapel..." value="{{ request('search') }}">
                    <button class="btn btn-primary px-3" type="submit"><i class="bi bi-search me-1"></i> Cari</button>
                    @if(request('search'))
                        <a href="{{ route('guru.index') }}" class="btn btn-outline-secondary">Reset</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Grid Card Guru -->
    <div class="row g-4">
        @forelse ($gurus as $guru)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-3">
                    <div class="card-body d-flex flex-column align-items-center">
                        <!-- Foto Guru -->
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" class="rounded-circle object-fit-cover shadow-sm" width="100" height="100">
                        </div>

                        <!-- Info Guru -->
                        <h6 class="fw-bold text-dark mb-1">{{ $guru->nama_guru }}</h6>
                        <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-1 rounded-pill">{{ $guru->mapel }}</span>

                        <div class="text-muted small mb-3">
                            <i class="bi bi-card-text me-1"></i> NIP: {{ $guru->nip }}
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="mt-auto d-flex gap-2 w-100 justify-content-center">
                            <a href="{{ route('guru.edit', $guru->id_guru) }}" class="btn btn-outline-warning btn-sm flex-fill">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                            <form action="{{ route('guru.destroy', $guru->id_guru) }}" method="POST" class="flex-fill" onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-3 text-center py-5">
                    <i class="bi bi-person-x text-muted display-4 mb-3"></i>
                    <h5 class="text-muted">Data guru belum tersedia.</h5>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
