@extends('layouts.template')

@section('title', 'Data User')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Daftar User</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Tambah User</a>
      </div>
      <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('users.index') }}" method="GET" class="mb-3">
          <div class="input-group" style="max-width: 350px;">
            <input type="text" name="search" class="form-control" placeholder="Cari username atau role..." value="{{ request('search') }}">
            <button class="btn btn-primary text-white" type="submit">Cari</button>
            @if(request('search'))
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Reset</a>
            @endif
          </div>
        </form>

        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $index => $user)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->role }}</td>
                <td>
                  <a href="{{ route('users.edit', ['id_user' => $user->id_user]) }}" class="btn btn-warning btn-sm">Edit</a>

                  <form action="{{ route('users.destroy') }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ $user->id_user }}">
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center">Data user tidak ditemukan.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
