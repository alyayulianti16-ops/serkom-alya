@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Data Ekstrakurikuler</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('ekstrakurikuler.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_eskul" value="{{ $ekskul->id_eskul }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Ekstrakurikuler</label>
                            <input type="text" name="nama_ekskul" class="form-control @error('nama_ekskul') is-invalid @enderror"
                                value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}" required>
                            @error('nama_ekskul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Pembina</label>
                                <input type="text" name="pembina" class="form-control @error('pembina') is-invalid @enderror"
                                    value="{{ old('pembina', $ekskul->pembina) }}" required>
                                @error('pembina')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Jadwal Latihan</label>
                                <input type="text" name="jadwal_latihan" class="form-control @error('jadwal_latihan') is-invalid @enderror"
                                    value="{{ old('jadwal_latihan', $ekskul->jadwal_latihan) }}" required>
                                @error('jadwal_latihan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar / Logo</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $ekskul->gambar) }}" class="rounded img-thumbnail" width="100">
                            </div>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                            <small class="text-muted">*Biarkan kosong jika tidak ingin mengubah gambar</small>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4"
                                required>{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-start gap-2">
                            <button type="submit" class="btn btn-primary fw-semibold"><i class="bi bi-save me-1"></i> Perbarui</button>
                            <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection