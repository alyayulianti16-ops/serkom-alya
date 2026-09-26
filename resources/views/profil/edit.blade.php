@extends('layouts.template')

@section('title', 'Edit Profil Sekolah')

@section('content')
<div class="container-fluid px-0">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="card-title mb-0 fw-bold text-primary">
                        <i class="bi bi-pencil-square me-2"></i>Form Edit Profil Sekolah
                    </h6>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('profile_sekolah.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- FORM INPUT LIST VIEW (BERURUTAN KE BAWAH) -->
                        <div class="d-flex flex-column gap-3">

                            <!-- Nama Sekolah -->
                            <div>
                                <label for="nama_sekolah" class="form-label fw-semibold text-secondary mb-1">Nama Sekolah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}" required placeholder="Masukkan nama sekolah">
                                @error('nama_sekolah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kepala Sekolah -->
                            <div>
                                <label for="kepala_sekolah" class="form-label fw-semibold text-secondary mb-1">Kepala Sekolah</label>
                                <input type="text" class="form-control @error('kepala_sekolah') is-invalid @enderror" id="kepala_sekolah" name="kepala_sekolah" value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}" placeholder="Nama kepala sekolah beserta gelar">
                                @error('kepala_sekolah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NPSN -->
                            <div>
                                <label for="npsn" class="form-label fw-semibold text-secondary mb-1">NPSN</label>
                                <input type="text" class="form-control @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ old('npsn', $profil->npsn ?? '') }}" placeholder="Nomor Pokok Sekolah Nasional">
                                @error('npsn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kontak / No. Telp -->
                            <div>
                                <label for="kontak" class="form-label fw-semibold text-secondary mb-1">Kontak / No. Telp</label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak" value="{{ old('kontak', $profil->kontak ?? '') }}" placeholder="08xx / (021) xxx">
                                @error('kontak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tahun Berdiri -->
                            <div>
                                <label for="tahun_berdiri" class="form-label fw-semibold text-secondary mb-1">Tahun Berdiri</label>
                                <input type="text" class="form-control @error('tahun_berdiri') is-invalid @enderror" id="tahun_berdiri" name="tahun_berdiri" value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}" placeholder="Contoh: 1995">
                                @error('tahun_berdiri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alamat Lengkap -->
                            <div>
                                <label for="alamat" class="form-label fw-semibold text-secondary mb-1">Alamat Lengkap</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat lengkap sekolah">{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Visi & Misi -->
                            <div>
                                <label for="visi_misi" class="form-label fw-semibold text-secondary mb-1">Visi & Misi</label>
                                <textarea class="form-control @error('visi_misi') is-invalid @enderror" id="visi_misi" name="visi_misi" rows="4" placeholder="Tuliskan visi dan misi sekolah">{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>
                                @error('visi_misi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Deskripsi Singkat -->
                            <div>
                                <label for="deskripsi" class="form-label fw-semibold text-secondary mb-1">Deskripsi Singkat</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Tuliskan deskripsi singkat mengenai sekolah">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- UPLOAD GAMBAR (LOGO & FOTO GEDUNG) DALAM 2 KOLOM -->
                            <div class="p-3 bg-light rounded mt-2">
                                <div class="row g-3">
                                    <!-- Upload Logo -->
                                    <div class="col-md-6">
                                        <label for="logo" class="form-label fw-semibold text-secondary mb-1">Logo Sekolah</label>
                                        <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo" accept="image/*">
                                        <small class="text-muted d-block mt-1">Format: JPG, PNG, WEBP. Maks 2MB.</small>
                                        @error('logo')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror

                                        @if(optional($profil)->logo)
                                            <div class="mt-2">
                                                <span class="d-block small text-muted mb-1">Logo saat ini:</span>
                                                <img src="{{ asset('storage/profil/' . $profil->logo) }}" alt="Logo Saat Ini" class="img-thumbnail" style="height: 70px; object-fit: contain;">
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Upload Foto Gedung -->
                                    <div class="col-md-6">
                                        <label for="foto" class="form-label fw-semibold text-secondary mb-1">Foto Gedung / Utama</label>
                                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" accept="image/*">
                                        <small class="text-muted d-block mt-1">Format: JPG, PNG, WEBP. Maks 2MB.</small>
                                        @error('foto')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror

                                        @if(optional($profil)->foto)
                                            <div class="mt-2">
                                                <span class="d-block small text-muted mb-1">Foto saat ini:</span>
                                                <img src="{{ asset('storage/profil/' . $profil->foto) }}" alt="Foto Gedung Saat Ini" class="img-thumbnail" style="height: 70px; object-fit: cover;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr class="my-4">

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('profile_sekolah.index') }}" class="btn btn-secondary px-4 fw-semibold">Batal</a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
