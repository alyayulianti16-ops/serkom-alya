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
                                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-person-plus me-2"></i>Tambah Data Siswa</h5>
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

                                        <form action="{{ route('siswa.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nisn" class="form-label fw-medium">NISN <span class="text-danger">*</span></label>
                                                <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nama_siswa" class="form-label fw-medium">Nama Siswa <span class="text-danger">*</span></label>
                                                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" placeholder="Masukkan Nama Lengkap Siswa" maxlength="40">
                                            </div>

                                            <div class="mb-3">
                                                <label for="jens_kelamin" class="form-label fw-medium">Jenis Kelamin <span class="text-danger">*</span></label>
                                                <select name="jens_kelamin" id="jens_kelamin" class="form-select">
                                                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                                    <option value="laki-laki">Laki-Laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="tahun_masuk" class="form-label fw-medium">Tahun Masuk <span class="text-danger">*</span></label>
                                                <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" placeholder="Contoh: 2024" min="2000" max="2099">
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('siswa.index') }}" class="btn btn-light border px-4">Batal</a>
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