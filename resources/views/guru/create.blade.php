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
                                <div class="card border-0 shadow-sm rounded-3">
                                    <div class="card-header bg-white py-3">
                                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-person-plus me-2"></i>Tambah Data Guru</h5>
                                    </div>
                                    <div class="card-body p-4 table-border-style">
                                        @if($errors->any())
                                        <div class="alert alert-danger mb-3">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="nip" class="form-label fw-medium">NIP <span class="text-danger">*</span></label>
                                                <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP Guru">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nama_guru" class="form-label fw-medium">Nama Guru <span class="text-danger">*</span></label>
                                                <input type="text" name="nama_guru" id="nama_guru" class="form-control" placeholder="Masukkan Nama Lengkap Guru" maxlength="40">
                                            </div>

                                            <div class="mb-3">
                                                <label for="mapel" class="form-label fw-medium">Mata Pelajaran <span class="text-danger">*</span></label>
                                                <input type="text" name="mapel" id="mapel" class="form-control" placeholder="Contoh: Matematika" maxlength="40">
                                            </div>

                                            <div class="mb-4">
                                                <label for="foto" class="form-label fw-medium">Foto Profil <span class="text-danger">*</span></label>
                                                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                                                <small class="text-muted">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.</small>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('guru.index') }}" class="btn btn-light border px-4">Batal</a>
                                                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Data</button>
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
