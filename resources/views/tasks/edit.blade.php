@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center"><i class="fas fa-edit"></i> Edit Tugas</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Tugas</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $task->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File Tugas</label>
                    <input type="file" class="form-control" id="file" name="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
