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
                                                <h5 class="mb-0">Data Siswa</h5>
                                            </div>
                                            <div class="col-md-8 d-flex justify-content-end gap-2">
                                                <form action="{{ route('siswa.index') }}" method="GET" class="d-flex me-2">
                                                    <input type="text" name="search" class="form-control form-control-sm me-1" placeholder="Cari NISN / Nama / Gender..." value="{{ request('search') }}">
                                                    <button type="submit" class="btn btn-sm btn-secondary">Cari</button>
                                                    @if(request('search'))
                                                        <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-light border ms-1">Reset</a>
                                                    @endif
                                                </form>

                                                <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NISN</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tahun Masuk</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($siswas as $siswa)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $siswa->nisn }}</td>
                                                            <td>{{ $siswa->nama_siswa }}</td>
                                                            <td>{{ ucfirst($siswa->jens_kelamin) }}</td>
                                                            <td>{{ $siswa->tahun_masuk }}</td>
                                                            <td>
                                                                <a href="{{ route('siswa.edit', ['id_siswa' => encrypt($siswa->id_siswa)]) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <form action="{{ route('siswa.destroy') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                    @csrf
                                                                    <input type="hidden" name="id_siswa" value="{{ encrypt($siswa->id_siswa) }}">
                                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">Data siswa belum tersedia.</td>
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