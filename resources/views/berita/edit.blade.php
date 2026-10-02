@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Data Berita</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('berita.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id_berita" value="{{ encrypt($berita->id_berita) }}">

                    <div class="mb-3">
                        <label for="judul" class="form-label fw-medium">Judul Berita <span class="text-danger"></span></label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->judul) }}" placeholder="Masukkan Judul Berita" required maxlength="50">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label fw-medium">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-d', strtotime($berita->tanggal))) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label fw-medium">Isi Berita <span class="text-danger">*</span></label>
                        <textarea name="isi" id="isi" rows="5" class="form-control @error('isi') is-invalid @enderror" placeholder="Masukkan Isi Berita Lengkap..." required>{{ old('isi', $berita->isi) }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="form-label fw-medium">Gambar Berita</label>
                        
                        @if($berita->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$berita->gambar) }}" class="rounded img-thumbnail" style="max-height: 120px;" alt="Preview Gambar">
                            </div>
                        @endif

                        <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('berita.index') }}" class="btn btn-light border px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection