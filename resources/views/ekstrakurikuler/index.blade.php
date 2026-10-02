@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-activity me-2"></i>Daftar Ekstrakurikuler</h5>
                    <a href="{{ route('ekstrakurikuler.create') }}" class="btn btn-primary btn-sm fw-semibold">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Ekstrakurikuler
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('ekstrakurikuler.index') }}" method="GET" class="mb-3">
                        <div class="input-group" style="max-width: 350px">
                            <input type="text" name="search" class="form-control" placeholder="Cari Nama Ekskul / Pembina..."
                                value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Cari</button>
                            @if (request('search'))
                                <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-outline-secondary">Reset</a>
                            @endif
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="50" class="text-center">No</th>
                                    <th width="80" class="text-center">Gambar</th>
                                    <th>Nama Ekskul</th>
                                    <th>Pembina</th>
                                    <th>Jadwal Latihan</th>
                                    <th>Deskripsi</th>
                                    <th width="150" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ekskul as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_ekskul }}"
                                                class="rounded object-fit-cover" width="45" height="45">
                                        </td>
                                        <td>{{ $item->nama_ekskul }}</td>
                                        <td>{{ $item->pembina }}</td>
                                        <td>{{ $item->jadwal_latihan }}</td>
                                        <td>{{ Str::limit($item->deskripsi, 30) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('ekstrakurikuler.edit', ['id' => $item->id_eskul]) }}"
                                                class="btn btn-warning btn-sm text-white me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('ekstrakurikuler.destroy') }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                <input type="hidden" name="id_eskul" value="{{ $item->id_eskul }}">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Data ekstrakurikuler tidak ditemukan.</td>
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