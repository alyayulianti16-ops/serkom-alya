@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-plus-lg me-2"></i>Tambah Data Ekstrakurikuler</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Ekstrakurikuler</label>
                            <input type="text" name="nama_ekskul" class="form-control @error('nama_ekskul') is-invalid @enderror"
                                value="{{ old('nama_ekskul') }}" placeholder="Contoh: Pramuka, Basket" required>
                            @error('nama_ekskul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Pembina</label>
                                <input type="text" name="pembina" class="form-control @error('pembina') is-invalid @enderror"
                                    value="{{ old('pembina') }}" placeholder="Nama Pembina" required>
                                @error('pembina')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Jadwal Latihan</label>
                                <input type="text" name="jadwal_latihan" class="form-control @error('jadwal_latihan') is-invalid @enderror"
                                    value="{{ old('jadwal_latihan') }}" placeholder="Contoh: Jumat, 15.00 WIB" required>
                                @error('jadwal_latihan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar / Logo</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" required>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4"
                                placeholder="Masukkan Deskripsi Ekstrakurikuler..." required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-start gap-2">
                            <button type="submit" class="btn btn-primary fw-semibold"><i class="bi bi-save me-1"></i> Simpan</button>
                            <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection