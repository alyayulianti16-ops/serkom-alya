@extends('layouts.template')

@section('title', 'Tambah User')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h5>Tambah User Baru</h5>
      </div>
      <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST" autocomplete="off">
          @csrf

          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}" autocomplete="off" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" autocomplete="new-password" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-control" required>
              <option value="">-- Pilih Role --</option>
              <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
              <option value="Operator" {{ old('role') == 'Operator' ? 'selected' : '' }}>Operator</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection