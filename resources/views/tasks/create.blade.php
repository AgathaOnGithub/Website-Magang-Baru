@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5"> {{-- Tambahkan mb-5 untuk memberi jarak ke footer --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4><i class="fas fa-tasks"></i> Tambah Tugas</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">Judul Tugas</label>
                            <input type="text" class="form-control" id="title" name="title" required placeholder="Masukkan judul tugas">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required placeholder="Deskripsi tugas"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="deadline" class="form-label fw-bold">Batas Waktu</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="pending">Pending</option>
                                <option value="in_progress">Sedang Dikerjakan</option>
                                <option value="completed">Selesai</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label fw-bold">Unggah File (PDF, DOCX, JPG, PNG)</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".pdf,.docx,.jpg,.png" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
