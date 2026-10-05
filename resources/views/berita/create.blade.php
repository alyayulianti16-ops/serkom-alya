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
                                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-newspaper me-2"></i>Tambah Data Berita</h5>
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

                                        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="judul" class="form-label fw-medium">Judul Berita <span class="text-danger">*</span></label>
                                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Berita" maxlength="50">
                                            </div>

                                            <div class="mb-3">
                                                <label for="tanggal" class="form-label fw-medium">Tanggal <span class="text-danger">*</span></label>
                                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="isi" class="form-label fw-medium">Isi Berita <span class="text-danger">*</span></label>
                                                <textarea name="isi" id="isi" rows="5" class="form-control" placeholder="Masukkan Isi Berita Lengkap..."></textarea>
                                            </div>

                                            <div class="mb-4">
                                                <label for="gambar" class="form-label fw-medium">Gambar Berita</label>
                                                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                                                <small class="text-muted">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB. (Opsional)</small>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('berita.index') }}" class="btn btn-light border px-4">Batal</a>
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