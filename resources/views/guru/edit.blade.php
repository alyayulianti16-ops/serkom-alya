@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Data Guru</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('guru.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_guru" value="{{ encrypt($guru->id_guru) }}">

                    <div class="mb-3">
                        <label for="nip" class="form-label fw-medium">NIP <span class="text-danger">*</span></label>
                        <input type="text" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $guru->nip) }}" required>
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_guru" class="form-label fw-medium">Nama Guru <span class="text-danger">*</span></label>
                        <input type="text" name="nama_guru" id="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" value="{{ old('nama_guru', $guru->nama_guru) }}" required maxlength="40">
                        @error('nama_guru')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mapel" class="form-label fw-medium">Mata Pelajaran <span class="text-danger">*</span></label>
                        <input type="text" name="mapel" id="mapel" class="form-control @error('mapel') is-invalid @enderror" value="{{ old('mapel', $guru->mapel) }}" required maxlength="40">
                        @error('mapel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="form-label fw-medium">Foto Profil</label>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            @if($guru->foto)
                                <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Saat Ini" class="rounded-circle object-fit-cover border" width="60" height="60">
                            @else
                                <div class="bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center border" style="width: 60px; height: 60px;">
                                    <i class="bi bi-person fs-3"></i>
                                </div>
                            @endif
                            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                        </div>
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('guru.index') }}" class="btn btn-light border px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i> Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection