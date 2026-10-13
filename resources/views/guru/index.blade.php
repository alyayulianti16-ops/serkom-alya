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
                                                <h5 class="mb-0">Data Guru</h5>
                                            </div>
                                            <div class="col-md-8 d-flex justify-content-end gap-2">
                                                <form action="{{ route('guru.index') }}" method="GET" class="d-flex me-2">
                                                    <input type="text" name="search" class="form-control form-control-sm me-1" placeholder="Cari NIP / nama..." value="{{ request('search') }}">
                                                    <button type="submit" class="btn btn-sm btn-secondary">Cari</button>
                                                    @if(request('search'))
                                                        <a href="{{ route('guru.index') }}" class="btn btn-sm btn-light border ms-1">Reset</a>
                                                    @endif
                                                </form>
                                                
                                                <a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-border-style">

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Foto</th>
                                                        <th>NIP</th>
                                                        <th>Nama Guru</th>
                                                        <th>Mata Pelajaran</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($gurus as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                @if($item->foto)
                                                                    <img src="{{ asset('storage/'.$item->foto) }}" class="rounded img-thumbnail" style="max-height: 50px; object-fit: cover;" alt="foto">
                                                                @else
                                                                    <span class="badge badge-secondary">Tidak ada foto</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->nip }}</td>
                                                            <td>{{ $item->nama_guru }}</td>
                                                            <td>{{ $item->mapel }}</td>
                                                            <td>
                                                                <a href="{{ route('guru.edit', ['id_guru' => encrypt($item->id_guru)]) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <form action="{{ route('guru.destroy') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                    @csrf
                                                                    <input type="hidden" name="id_guru" value="{{ encrypt($item->id_guru) }}">
                                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">Data guru belum tersedia.</td>
                                                        </tr>
                                                    @endempty
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