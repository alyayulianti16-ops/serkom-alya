@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Data Galeri</h5>
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

                <form action="{{ route('galeri.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_galeri" value="{{ encrypt($galeri->id_galeri) }}">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Galeri <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}" required placeholder="Masukkan Judul Galeri">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-control" required>
                                <option value="foto" {{ $galeri->kategori == 'foto' ? 'selected' : '' }}>Foto</option>
                                <option value="video" {{ $galeri->kategori == 'video' ? 'selected' : '' }}>Video</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d', strtotime($galeri->tanggal)) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">File Media</label>
                        @if ($galeri->kategori == 'foto' && $galeri->file)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $galeri->file) }}" class="rounded img-thumbnail" width="100">
                            </div>
                        @endif
                        <input type="file" name="file" class="form-control" accept="image/*,video/*">
                        <small class="text-muted">*Biarkan kosong jika tidak ingin mengubah file</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan <span class="text-danger">*</span></label>
                        <textarea name="keterangan" class="form-control" rows="4" required placeholder="Masukkan Keterangan Galeri...">{{ $galeri->keterangan }}</textarea>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary fw-semibold"><i class="bi bi-save me-1"></i> Perbarui</button>
                        <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection