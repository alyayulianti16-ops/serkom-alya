@extends('layouts.template')

@section('title', 'Tambah Data Siswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-person-plus me-2"></i>Tambah Data Siswa</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf

                    <!-- NISN -->
                    <div class="mb-3">
                        <label for="nisn" class="form-label fw-medium">NISN <span class="text-danger">*</span></label>
                        <input type="text" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}" placeholder="Masukkan NISN" required maxlength="10">
                        @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama Siswa -->
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label fw-medium">Nama Siswa <span class="text-danger">*</span></label>
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa') }}" placeholder="Masukkan Nama Lengkap Siswa" required maxlength="40">
                        @error('nama_siswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-3">
                        <label for="jens_kelamin" class="form-label fw-medium">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jens_kelamin" id="jens_kelamin" class="form-select @error('jens_kelamin') is-invalid @enderror" required>
                            <option value="" disabled {{ old('jens_kelamin') == '' ? 'selected' : '' }}>-- Pilih Jenis Kelamin --</option>
                            <option value="laki-laki" {{ old('jens_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="perempuan" {{ old('jens_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jens_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tahun Masuk -->
                    <div class="mb-4">
                        <label for="tahun_masuk" class="form-label fw-medium">Tahun Masuk <span class="text-danger">*</span></label>
                        <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror" value="{{ old('tahun_masuk', date('Y')) }}" placeholder="Contoh: 2024" min="2000" max="2099" required>
                        @error('tahun_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('siswa.index') }}" class="btn btn-light border px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
