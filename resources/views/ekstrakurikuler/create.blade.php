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
                                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-plus-lg me-2"></i>Tambah Data Ekstrakurikuler</h5>
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

                                        <form action="{{ route('ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                                                <input type="text" name="nama_ekskul" class="form-control" placeholder="Contoh: Pramuka, Basket">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-semibold">Pembina <span class="text-danger">*</span></label>
                                                    <input type="text" name="pembina" class="form-control" placeholder="Nama Pembina">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-semibold">Jadwal Latihan <span class="text-danger">*</span></label>
                                                    <input type="text" name="jadwal_latihan" class="form-control" placeholder="Contoh: Jumat, 15.00 WIB">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Gambar / Logo <span class="text-danger">*</span></label>
                                                <input type="file" name="gambar" class="form-control" accept="image/*">
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                                                <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan Deskripsi Ekstrakurikuler..."></textarea>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-light border px-4">Batal</a>
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