@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">📌 Daftar Program Magang</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h3 class="card-title text-primary">{{ $internship->name }}</h3>
            <p class="card-text">{{ $internship->description }}</p>
            <p class="card-text"><small class="text-muted">📍 Lokasi: {{ $internship->location }}</small></p>
            <div class="d-flex gap-2">
                <a href="{{ route('internships.show', $internship->id) }}" class="btn btn-primary">🔍 Detail</a>

                @auth
                    <form action="{{ route('internships.submit', $internship->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">✅ Daftar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning">🔑 Login untuk Mendaftar</a>
                @endauth
            </div>
        </div>
    </div>

    @auth
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="mb-3 text-secondary">📤 Upload Dokumen Persyaratan</h4>
            
            <form action="{{ route('internships.uploadResume', $internship->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="mb-3">
                    <label for="resume" class="form-label">📄 Upload Resume (PDF, Max 2MB)</label>
                    <input type="file" class="form-control" name="resume" id="resume" required>
                </div>
                <button type="submit" class="btn btn-info">⬆️ Upload Resume</button>
            </form>

            <form action="{{ route('internships.uploadCv', $internship->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="mb-3">
                    <label for="cv" class="form-label">📑 Upload CV (PDF, Max 2MB)</label>
                    <input type="file" class="form-control" name="cv" id="cv" required>
                </div>
                <button type="submit" class="btn btn-info">⬆️ Upload CV</button>
            </form>

            <form action="{{ route('internships.uploadGrades', $internship->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="mb-3">
                    <label for="grades" class="form-label">📊 Upload Rekap Nilai (PDF, Max 2MB)</label>
                    <input type="file" class="form-control" name="grades" id="grades" required>
                </div>
                <button type="submit" class="btn btn-info">⬆️ Upload Rekap Nilai</button>
            </form>

            <form action="{{ route('internships.uploadApproval', $internship->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="approval" class="form-label">📝 Upload Surat Persetujuan Magang (PDF, Max 2MB)</label>
                    <input type="file" class="form-control" name="approval" id="approval" required>
                </div>
                <button type="submit" class="btn btn-info">⬆️ Upload Surat Persetujuan</button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-3 text-secondary">💬 Tambahkan Komentar</h4>
            <form action="{{ route('internships.addComment', $internship->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="comment" class="form-label">Komentar</label>
                    <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-secondary">➕ Tambahkan Komentar</button>
            </form>
        </div>
    </div>
    @endauth
</div>
@endsection
