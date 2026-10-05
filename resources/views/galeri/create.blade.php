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
                                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-plus-lg me-2"></i>Tambah Data Galeri</h5>
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

                                        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Judul Galeri <span class="text-danger">*</span></label>
                                                <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul (Maks. 50 Karakter)">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                                    <select name="kategori" class="form-select">
                                                        <option value="" disabled selected>-- Pilih Kategori --</option>
                                                        <option value="foto">Foto</option>
                                                        <option value="video">Video</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                                                    <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">File Media <span class="text-danger">*</span></label>
                                                <input type="file" name="file" class="form-control" accept="image/*,video/*">
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">Keterangan <span class="text-danger">*</span></label>
                                                <textarea name="keterangan" class="form-control" rows="4" placeholder="Masukkan Keterangan..."></textarea>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('galeri.index') }}" class="btn btn-light border px-4">Batal</a>
                                                <button type="submit" class="btn btn-primary px-4 fw-semibold"><i class="bi bi-save me-1"></i> Simpan Data</button>
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