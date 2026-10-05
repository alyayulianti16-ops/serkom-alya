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

                                        <form action="{{ route('berita.update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id_berita" value="{{ encrypt($berita->id_berita) }}">

                                            <div class="form-group">
                                                <label for="judul">Judul Berita:</label>
                                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" required placeholder="Masukkan Judul Berita" maxlength="50">
                                            </div>

                                            <div class="form-group">
                                                <label for="tanggal">Tanggal:</label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ date('Y-m-d', strtotime($berita->tanggal)) }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="isi">Isi Berita:</label>
                                                <textarea class="form-control" id="isi" name="isi" rows="5" placeholder="Masukkan Isi Berita Lengkap..." required>{{ $berita->isi }}</textarea>
                                            </div>

                                            <div class="form-group bg-light p-3 rounded">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="gambar">Gambar Berita:</label>
                                                        <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                                                        <small class="form-text text-muted">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.</small>

                                                        @if($berita && $berita->gambar)
                                                            <div class="mt-2">
                                                                <span class="d-block small text-muted mb-1">Gambar saat ini:</span>
                                                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita Saat Ini" class="img-thumbnail" style="height: 70px; object-fit: cover;">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <div class="form-group">
                                                <a href="{{ route('berita.index') }}" class="btn btn-md btn-secondary">BATAL</a>
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