@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit User</h5>
            </div>
            <div class="card-body p-4">
                @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('users.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ $user->id_user }}">

                    <div class="mb-3">
                        <label class="form-label fw-medium">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required placeholder="Masukkan Username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Role <span class="text-danger">*</span></label>
                        <select name="role" class="form-control" required>
                            <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Operator" {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>Operator</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-medium">Password Baru <small class="text-muted">(Kosongkan jika tidak diubah)</small></label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password Baru">
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('users.index') }}" class="btn btn-light border px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection