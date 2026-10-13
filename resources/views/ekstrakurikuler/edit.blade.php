@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Data Ekstrakurikuler</h5>
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('ekstrakurikuler.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_eskul" value="{{ encrypt($ekskul->id_eskul) }}">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                        <input type="text" name="nama_ekskul" class="form-control" value="{{ $ekskul->nama_ekskul }}" required placeholder="Masukkan Nama Ekstrakurikuler">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Pembina <span class="text-danger">*</span></label>
                            <input type="text" name="pembina" class="form-control" value="{{ $ekskul->pembina }}" required placeholder="Masukkan Nama Pembina">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jadwal Latihan <span class="text-danger">*</span></label>
                            <input type="text" name="jadwal_latihan" class="form-control" value="{{ $ekskul->jadwal_latihan }}" required placeholder="Contoh: Senin, 15:30 WIB">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar / Logo</label>
                        @if ($ekskul->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $ekskul->gambar) }}" class="rounded img-thumbnail" width="100">
                            </div>
                        @endif
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted">*Biarkan kosong jika tidak ingin mengubah gambar</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" class="form-control" rows="4" required placeholder="Masukkan Deskripsi Ekstrakurikuler...">{{ $ekskul->deskripsi }}</textarea>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary fw-semibold"><i class="bi bi-save me-1"></i> Perbarui</button>
                        <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection