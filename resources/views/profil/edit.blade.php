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
                                    <div class="card-body table-border-style">
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <form action="{{ route('profile_sekolah.update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="nama_sekolah">Nama Sekolah:</label>
                                                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="{{ $profil->nama_sekolah ?? '' }}" required placeholder="Masukkan nama resmi satuan pendidikan">
                                            </div>

                                            <div class="form-group">
                                                <label for="kepala_sekolah">Kepala Sekolah:</label>
                                                <input type="text" class="form-control" id="kepala_sekolah" name="kepala_sekolah" value="{{ $profil->kepala_sekolah ?? '' }}" placeholder="Nama lengkap kepala sekolah beserta gelar akademik">
                                            </div>

                                            <div class="form-group">
                                                <label for="npsn">NPSN:</label>
                                                <input type="text" class="form-control" id="npsn" name="npsn" value="{{ $profil->npsn ?? '' }}" placeholder="Nomor Pokok Sekolah Nasional">
                                            </div>

                                            <div class="form-group">
                                                <label for="kontak">Kontak / No. Telepon:</label>
                                                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $profil->kontak ?? '' }}" placeholder="Nomor telepon atau faksimili resmi sekolah">
                                            </div>

                                            <div class="form-group">
                                                <label for="tahun_berdiri">Tahun Berdiri:</label>
                                                <input type="text" class="form-control" id="tahun_berdiri" name="tahun_berdiri" value="{{ $profil->tahun_berdiri ?? '' }}" placeholder="Tahun pendirian institusi (contoh: 1995)">
                                            </div>

                                            <div class="form-group">
                                                <label for="alamat">Alamat Lengkap:</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat lengkap lokasi sekolah">{{ $profil->alamat ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="visi_misi">Visi dan Misi:</label>
                                                <textarea class="form-control" id="visi_misi" name="visi_misi" rows="4" placeholder="Tuliskan pernyataan visi dan misi sekolah secara formal">{{ $profil->visi_misi ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi Singkat:</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Tuliskan profil singkat atau sejarah ringkas institusi">{{ $profil->deskripsi ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group bg-light p-3 rounded">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="logo">Logo Sekolah:</label>
                                                        <input type="file" class="form-control-file" id="logo" name="logo" accept="image/*">
                                                        <small class="form-text text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB.</small>

                                                        @if($profil && $profil->logo)
                                                            <div class="mt-2">
                                                                <span class="d-block small text-muted mb-1">Logo saat ini:</span>
                                                                <img src="{{ asset('storage/profil/' . $profil->logo) }}" alt="Logo Saat Ini" class="img-thumbnail" style="height: 70px; object-fit: contain;">
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="foto">Foto Gedung / Utama:</label>
                                                        <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                                                        <small class="form-text text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB.</small>

                                                        @if($profil && $profil->foto)
                                                            <div class="mt-2">
                                                                <span class="d-block small text-muted mb-1">Foto gedung saat ini:</span>
                                                                <img src="{{ asset('storage/profil/' . $profil->foto) }}" alt="Foto Gedung Saat Ini" class="img-thumbnail" style="height: 70px; object-fit: cover;">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <div class="form-group">
                                                <a href="{{ route('profile_sekolah.index') }}" class="btn btn-md btn-secondary">BATAL</a>
                                                <input type="submit" value="SIMPAN" name="simpan" class="btn btn-md btn-primary">
                                            </div>
                                        </form>
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