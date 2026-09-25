@extends('layouts.template')

@section('title', 'Edit Profil Sekolah')

@section('content')
<div class="container-fluid px-0">
    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm mb-4">
            <div class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i>Terjadi kesalahan:</div>
            <ul class="mb-0 small ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile_sekolah.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="card-title mb-0 fw-bold text-primary">Logo Sekolah</h6>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="d-flex align-items-center justify-content-center bg-light rounded border p-3 mb-3" style="min-height: 160px;">
                            <img id="preview-logo"
                                 src="{{ optional($profil)->logo ? asset('storage/profil/' . $profil->logo) : '' }}"
                                 class="img-fluid rounded {{ optional($profil)->logo ? '' : 'd-none' }}"
                                 style="max-height: 130px; object-fit: contain;">

                            <div id="placeholder-logo" class="text-muted small {{ optional($profil)->logo ? 'd-none' : '' }}">
                                <i class="bi bi-image fs-1 d-block mb-1 text-secondary"></i>
                                Belum ada logo
                            </div>
                        </div>
                        <input type="file" name="logo" id="input-logo" class="form-control form-control-sm" accept="image/*">
                        <small class="text-muted d-block mt-1 text-start" style="font-size: 11px;">Format: JPG, PNG, WEBP (Max 2MB)</small>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="card-title mb-0 fw-bold text-primary">Foto Gedung / Utama</h6>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="d-flex align-items-center justify-content-center bg-light rounded border p-3 mb-3" style="min-height: 180px;">
                            <img id="preview-foto"
                                 src="{{ optional($profil)->foto ? asset('storage/profil/' . $profil->foto) : '' }}"
                                 class="img-fluid rounded shadow-sm {{ optional($profil)->foto ? '' : 'd-none' }}"
                                 style="max-height: 150px; width: 100%; object-fit: cover;">

                            <div id="placeholder-foto" class="text-muted small {{ optional($profil)->foto ? 'd-none' : '' }}">
                                <i class="bi bi-card-image fs-1 d-block mb-1 text-secondary"></i>
                                Belum ada foto gedung
                            </div>
                        </div>
                        <input type="file" name="foto" id="input-foto" class="form-control form-control-sm" accept="image/*">
                        <small class="text-muted d-block mt-1 text-start" style="font-size: 11px;">Format: JPG, PNG, WEBP (Max 2MB)</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="card-title mb-0 fw-bold text-primary">Edit Informasi Sekolah</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary small">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" class="form-control" value="{{ old('nama_sekolah', optional($profil)->nama_sekolah) }}" placeholder="Contoh: SMKN 1 Kota" required maxlength="40">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary small">Kepala Sekolah</label>
                                <input type="text" name="kepala_sekolah" class="form-control" value="{{ old('kepala_sekolah', optional($profil)->kepala_sekolah) }}" placeholder="Nama Kepala Sekolah" required maxlength="40">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-secondary small">NPSN</label>
                                <input type="text" name="npsn" class="form-control" value="{{ old('npsn', optional($profil)->npsn) }}" placeholder="8 digit NPSN" required maxlength="10">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-secondary small">Kontak / No Telp</label>
                                <input type="text" name="kontak" class="form-control" value="{{ old('kontak', optional($profil)->kontak) }}" placeholder="08xxx / (021)xxx" required maxlength="15">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-secondary small">Tahun Berdiri</label>
                                <input type="number" name="tahun_berdiri" class="form-control" value="{{ old('tahun_berdiri', optional($profil)->tahun_berdiri) }}" placeholder="YYYY" required min="1901" max="{{ date('Y') }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat jalan, kelurahan, kecamatan..." required>{{ old('alamat', optional($profil)->alamat) }}</textarea>
                        </div>

                        <hr class="my-4 text-secondary opacity-25">

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary small">Visi & Misi</label>
                                <textarea name="visi_misi" class="form-control" rows="5" placeholder="Tuliskan visi dan misi sekolah..." required>{{ old('visi_misi', optional($profil)->visi_misi) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-secondary small">Deskripsi Singkat</label>
                                <textarea name="deskripsi" class="form-control" rows="5" placeholder="Penjelasan umum tentang sekolah..." required>{{ old('deskripsi', optional($profil)->deskripsi) }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between pt-2">
                            <a href="{{ route('profile_sekolah.index') }}" class="btn btn-secondary px-4 fw-semibold">Batal</a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function setupPreview(inputId, previewId, placeholderId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const placeholder = document.getElementById(placeholderId);

        if (input) {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none');
                        placeholder.classList.add('d-none');
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
    }

    setupPreview('input-logo', 'preview-logo', 'placeholder-logo');
    setupPreview('input-foto', 'preview-foto', 'placeholder-foto');
</script>
@endsection
