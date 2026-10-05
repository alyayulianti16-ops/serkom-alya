@extends('layouts.template')

@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <h5 class="mb-0">Daftar Ekstrakurikuler</h5>
                                            </div>
                                            <div class="col-md-8 d-flex justify-content-end gap-2">
                                                <form action="{{ route('ekstrakurikuler.index') }}" method="GET" class="d-flex me-2">
                                                    <input type="text" name="search" class="form-control form-control-sm me-1" placeholder="Cari Ekskul / Pembina..." value="{{ request('search') }}">
                                                    <button type="submit" class="btn btn-sm btn-secondary">Cari</button>
                                                    @if(request('search'))
                                                        <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-sm btn-light border ms-1">Reset</a>
                                                    @endif
                                                </form>
                                                
                                                <a href="{{ route('ekstrakurikuler.create') }}" class="btn btn-sm btn-primary">Tambah Ekstrakurikuler</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-border-style">

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Gambar</th>
                                                        <th>Nama Ekskul</th>
                                                        <th>Pembina</th>
                                                        <th>Jadwal Latihan</th>
                                                        <th>Deskripsi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($ekskul as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                @if($item->gambar)
                                                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded img-thumbnail" style="max-height: 50px; object-fit: cover;" alt="{{ $item->nama_ekskul }}">
                                                                @else
                                                                    <span class="badge badge-secondary">Tidak ada gambar</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->nama_ekskul }}</td>
                                                            <td>{{ $item->pembina }}</td>
                                                            <td>{{ $item->jadwal_latihan }}</td>
                                                            <td>{{ Str::limit($item->deskripsi, 30) }}</td>
                                                            <td>
                                                                <a href="{{ route('ekstrakurikuler.edit', ['id_eskul' => encrypt($item->id_eskul)]) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <form action="{{ route('ekstrakurikuler.destroy') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                    @csrf
                                                                    <input type="hidden" name="id_eskul" value="{{ $item->id_eskul }}">
                                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="text-center">Data ekstrakurikuler tidak ditemukan.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection