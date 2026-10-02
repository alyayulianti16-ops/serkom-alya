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
                                                <h5 class="mb-0">Data Galeri</h5>
                                            </div>
                                            <div class="col-md-8 d-flex justify-content-end gap-2">
                                                <form action="{{ route('galeri.index') }}" method="GET" class="d-flex me-2">
                                                    <input type="text" name="search" class="form-control form-control-sm me-1" placeholder="Cari galeri..." value="{{ request('search') }}">
                                                    <button type="submit" class="btn btn-sm btn-secondary">Cari</button>
                                                    @if(request('search'))
                                                        <a href="{{ route('galeri.index') }}" class="btn btn-sm btn-light border ms-1">Reset</a>
                                                    @endif
                                                </form>
                                                
                                                <a href="{{ route('galeri.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-border-style">

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Media</th>
                                                        <th>Judul</th>
                                                        <th>Kategori</th>
                                                        <th>Tanggal</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($galeris as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                @if($item->kategori == 'foto' && $item->file)
                                                                    <img src="{{ asset('storage/'.$item->file) }}" class="rounded img-thumbnail" style="max-height: 50px; object-fit: cover;" alt="gambar">
                                                                @elseif($item->kategori == 'video')
                                                                    <span class="badge bg-dark text-white"><i class="bi bi-camera-video"></i> Video</span>
                                                                @else
                                                                    <span class="badge badge-secondary">Tidak ada media</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->judul }}</td>
                                                            <td>{{ ucfirst($item->kategori) }}</td>
                                                            <td>{{ date('Y-m-d', strtotime($item->tanggal)) }}</td>
                                                            <td>{{ Str::limit($item->keterangan, 50) }}</td>
                                                            <td>
                                                                <a href="{{ route('galeri.edit', ['id' => encrypt($item->id_galeri)]) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <form action="{{ route('galeri.destroy') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data galeri ini?')">
                                                                    @csrf
                                                                    <input type="hidden" name="id_galeri" value="{{ encrypt($item->id_galeri) }}">
                                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="text-center">Data galeri belum tersedia.</td>
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