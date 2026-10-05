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
                                                <h5 class="mb-0">Data Berita</h5>
                                            </div>
                                            <div class="col-md-8 d-flex justify-content-end gap-2">
                                                <form action="{{ route('berita.index') }}" method="GET" class="d-flex me-2">
                                                    <input type="text" name="search" class="form-control form-control-sm me-1" placeholder="Cari berita..." value="{{ request('search') }}">
                                                    <button type="submit" class="btn btn-sm btn-secondary">Cari</button>
                                                    @if(request('search'))
                                                        <a href="{{ route('berita.index') }}" class="btn btn-sm btn-light border ms-1">Reset</a>
                                                    @endif
                                                </form>
                                                
                                                <a href="{{ route('berita.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-border-style">

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Gambar</th>
                                                        <th>Judul Berita</th>
                                                        <th>Tanggal</th>
                                                        <th>Isi Ringkas</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($beritas as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                @if($item->gambar)
                                                                    <img src="{{ asset('storage/'.$item->gambar) }}" class="rounded img-thumbnail" style="max-height: 50px; object-fit: cover;" alt="gambar">
                                                                @else
                                                                    <span class="badge badge-secondary">Tidak ada gambar</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->judul }}</td>
                                                            <td>{{ date('Y-m-d', strtotime($item->tanggal)) }}</td>
                                                            <td>{{ Str::limit($item->isi, 100) }}</td>
                                                            <td>
                                                                <a href="{{ route('berita.edit', ['id_berita' => encrypt($item->id_berita)]) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <form action="{{ route('berita.destroy') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                                    @csrf
                                                                    <input type="hidden" name="id_berita" value="{{ encrypt($item->id_berita) }}">
                                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">Data berita belum tersedia.</td>
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