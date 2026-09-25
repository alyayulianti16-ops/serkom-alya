@extends('layouts.template')

@section('title', 'Edit User')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h5>Edit User</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('users.update') }}" method="POST">
          @csrf

          <input type="hidden" name="id_user" value="{{ $user->id_user }}">

          @if ($errors->any())
          <div class="alert alert-danger mb-3">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-control" required>
              <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
              <option value="Operator" {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>Operator</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Password Baru <small class="text-muted">(Kosongkan jika tidak diubah)</small></label>
            <input type="password" name="password" class="form-control">
          </div>

          <button type="submit" class="btn btn-success">Update</button>
          <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection