@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Program Magang</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($internships->isEmpty())
        <p class="text-center text-muted">Belum ada program magang yang tersedia.</p>
    @else
        <div class="row d-flex justify-content-center">
            @foreach($internships as $internship)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0 rounded-4 p-3" style="background-color: #F9FAFC;">
                        <div class="card-body">
                            <h5 class="fw-bold text-dark">{{ $internship->name }}</h5>
                            <p class="text-muted" style="font-size: 14px;">{{ Str::limit($internship->description, 120) }}</p>
                            <a href="{{ route('internships.show', $internship->id) }}" class="btn btn-primary btn-sm rounded-pill px-4">
                                Lihat Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
