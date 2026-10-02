@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Data Galeri</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('galeri.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_galeri" value="{{ encrypt($galeri->id_galeri) }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Galeri</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $galeri->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                    <option value="foto" {{ old('kategori', $galeri->kategori) == 'foto' ? 'selected' : '' }}>Foto</option>
                                    <option value="video" {{ old('kategori', $galeri->kategori) == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', $galeri->tanggal) }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">File Media</label>
                            @if ($galeri->kategori == 'foto')
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $galeri->file) }}" class="rounded img-thumbnail" width="100">
                                </div>
                            @endif
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                            <small class="text-muted">*Biarkan kosong jika tidak ingin mengubah file</small>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="4"
                                required>{{ old('keterangan', $galeri->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-start gap-2">
                            <button type="submit" class="btn btn-primary fw-semibold"><i class="bi bi-save me-1"></i> Perbarui</button>
                            <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection