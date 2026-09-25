@extends('layouts.template')

@section('title', 'Data Guru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-person-badge me-2"></i>Daftar Guru</h5>
                <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm fw-semibold">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Guru
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Form Pencarian -->
                <form action="{{ route('guru.index') }}" method="GET" class="mb-4">
                    <div class="input-group" style="max-width: 350px">
                        <input type="text" name="search" class="form-control" placeholder="Cari NIP / Nama / Mapel..." value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Cari</button>
                        @if(request('search'))
                            <a href="{{ route('guru.index') }}" class="btn btn-outline-secondary">Reset</a>
                        @endif
                    </div>
                </form>

                <!-- Grid Card Guru -->
                <div class="row g-4">
                    @forelse ($gurus as $guru)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm text-center p-3 rounded-3 position-relative hover-shadow transition">
                            <!-- Foto Guru -->
                            <div class="mx-auto mb-3" style="width: 100px; height: 100px;">
                                @if($guru->foto && file_exists(public_path('storage/' . $guru->foto)))
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" class="rounded-circle w-100 h-100" style="object-fit: cover; border: 3px solid #0d6efd;">
                                @else
                                    <div class="bg-light text-primary rounded-circle w-100 h-100 d-flex align-items-center justify-content-center border border-2 border-primary">
                                        <i class="bi bi-person-fill display-4"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Detail Guru -->
                            <h6 class="card-title fw-bold mb-1 text-dark">{{ $guru->nama_guru }}</h6>
                            <p class="badge bg-primary-subtle text-primary fw-medium mb-2 align-self-center px-3 py-1 rounded-pill">
                                <i class="bi bi-book me-1"></i>{{ $guru->mapel }}
                            </p>
                            <small class="text-muted mb-3 d-block">
                                <i class="bi bi-card-text me-1"></i>NIP: {{ $guru->nip ?? '-' }}
                            </small>

                            <!-- Tombol Aksi -->
                            <div class="mt-auto d-flex justify-content-center gap-2 pt-2 border-top">
                                <a href="{{ route('guru.edit', $guru->id_guru) }}" class="btn btn-outline-warning btn-sm w-50">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('guru.destroy', $guru->id_guru) }}" method="POST" class="w-50" onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                        <i class="bi bi-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-person-x display-1 text-muted"></i>
                        <p class="text-muted mt-3">Data guru tidak ditemukan.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-end mt-4">
                    {{ $gurus->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
