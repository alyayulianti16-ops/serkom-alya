@extends('layouts.template')

@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card border-0 shadow-sm rounded-3">
                                    <div class="card-header bg-white py-3">
                                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Data Siswa</h5>
                                    </div>
                                    <div class="card-body p-4">
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <form action="{{ route('siswa.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_siswa" value="{{ encrypt($siswa->id_siswa) }}">

                                            <div class="mb-3">
                                                <label for="nisn" class="form-label fw-medium">NISN <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $siswa->nisn }}" required placeholder="Masukkan NISN">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nama_siswa" class="form-label fw-medium">Nama Siswa <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required placeholder="Masukkan Nama Lengkap Siswa" maxlength="40">
                                            </div>

                                            <div class="mb-3">
                                                <label for="jens_kelamin" class="form-label fw-medium">Jenis Kelamin <span class="text-danger">*</span></label>
                                                <select class="form-control" id="jens_kelamin" name="jens_kelamin" required>
                                                    <option value="laki-laki" {{ $siswa->jens_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                    <option value="perempuan" {{ $siswa->jens_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="tahun_masuk" class="form-label fw-medium">Tahun Masuk <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" value="{{ $siswa->tahun_masuk }}" required placeholder="Contoh: 2024" min="2000" max="2099">
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('siswa.index') }}" class="btn btn-light border px-4">Batal</a>
                                                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i> Perbarui Data</button>
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