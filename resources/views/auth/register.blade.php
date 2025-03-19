@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-lg-8 col-md-10 col-sm-12 bg-white p-5 shadow rounded">
        <h2 class="text-center mb-4">Register</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="institution" class="form-label">Instansi Pendidikan</label>
                    <select class="form-control" id="institution" name="institution" required>
                        <option value="">Pilih Instansi Pendidikan Anda</option>
                        <option value="Universitas Padjajaran">Universitas Padjajaran</option>
                        <option value="Universitas Pendidikan Indonesia">Universitas Pendidikan Indonesia</option>
                        <option value="Universitas Indonesia">Universitas Indonesia</option>
                        <option value="Institut Teknologi Bandung">Institut Teknologi Bandung</option>
                        <option value="Universitas Nusa Putra">Universitas Nusa Putra</option>
                        <option value="Politeknik Bandung">Politeknik Bandung</option>
                        <option value="Universitas Gajah Mada">Universitas Gajah Mada</option>
                        <option value="Universitas Muhammadiyah Sukabumi">Universitas Muhammadiyah Sukabumi</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="major" class="form-label">Jurusan</label>
                    <select class="form-control" id="major" name="major" required>
                        <option value="">Pilih Jurusan Anda</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                        <option value="Pendidikan Teknologi Informasi">Pendidikan Teknologi Informasi</option>
                        <option value="Seni Murni">Seni Murni</option>
                        <option value="Desain Grafis (DKV)">Desain Grafis (DKV)</option>
                        <option value="Manajemen Retail">Manajemen Retail</option>
                        <option value="Administrasi Publik">Administrasi Publik</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" required>
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password', 'togglePasswordIcon')">
                            <i id="togglePasswordIcon" class="fa fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation', 'toggleConfirmPasswordIcon')">
                            <i id="toggleConfirmPasswordIcon" class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="role" class="form-label">Peran</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="">Pilih Peran</option>
                        <option value="User">User</option>
                        <option value="Pembimbing">Pembimbing</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3 text-end">
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    @error('g-recaptcha-response')
                       <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-darkred w-100">Daftar</button>
        </form>

        <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('login') }}" class="text-danger">Login</a></p>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
    function togglePassword(fieldId, iconId) {
        let field = document.getElementById(fieldId);
        let icon = document.getElementById(iconId);
        if (field.type === "password") {
            field.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            field.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection

@push('styles')
<style>
    .btn-darkred {
        background-color: #8B0000;
        color: white;
        border: none;
    }

    .btn-darkred:hover {
        background-color: #6A0000;
    }
</style>
@endpush
