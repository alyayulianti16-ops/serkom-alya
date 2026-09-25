@extends('layouts.template')

@section('title', 'Data Siswa')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-people me-2"></i>Daftar Siswa</h5>
                <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm fw-semibold">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Siswa
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.index') }}" method="GET" class="mb-3">
                    <div class="input-group" style="max-width: 350px">
                        <input type="text" name="search" class="form-control" placeholder="Cari NISN / Nama..." value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Cari</button>
                        @if(request('search'))
                            <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary">Reset</a>
                        @endif
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="50" class="text-center">No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Tahun Masuk</th>
                                <th width="150" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswas as $siswa)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td>
                                    <span class="badge {{ $siswa->jens_kelamin == 'laki-laki' ? 'bg-info' : 'bg-danger' }}">
                                        {{ ucfirst($siswa->jens_kelamin) }}
                                    </span>
                                </td>
                                <td>{{ $siswa->tahun_masuk }}</td>
                                <td class="text-center">
                                    <a href="{{ route('siswa.edit', $siswa->id_siswa) }}" class="btn btn-warning btn-sm text-white me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('siswa.destroy', $siswa->id_siswa) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Data siswa tidak ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
