@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4 font-weight-bold">Profil Pengguna</h2>
    <div class="card shadow border-0 rounded-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($user->profile_picture)
                        <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" class="rounded-circle" width="150" alt="Foto Profil">
                    @else
                        <img src="{{ asset('images/profile/default.png') }}" class="rounded-circle" width="150" alt="Foto Profil">
                    @endif
                </div>
                <div class="col-md-8">
                    <h4>{{ $user->name }}</h4>
                    <p>Email: {{ $user->email }}</p>
                    <p>No. Telepon: {{ $user->phone ?? 'Tidak tersedia' }}</p>
                    <p>Alamat: {{ $user->address ?? 'Tidak tersedia' }}</p>
                    
                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'pembimbing')
                        <hr>
                        <h5>Informasi Magang</h5>
                        <p>Program Magang: {{ $user->internship ? $user->internship->title : 'Sudah Terdaftar' }}</p>
                        <p>Status: {{ $user->internship_status ?? 'Mahasiswa' }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
