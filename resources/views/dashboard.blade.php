@extends('layouts.template')

@section('title', 'Dashboard - Profile Sekolah')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Selamat Datang, {{ Auth::user()->username ?? 'User' }}!</h5>
            </div>
            <div class="card-body">
                <p class="mb-0">Kamu berhasil login ke Panel Pengelola Profile Sekolah.</p>
            </div>
        </div>
    </div>
</div>
@endsection
