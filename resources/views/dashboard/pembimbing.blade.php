@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Profil Pembimbing -->
    <h2 class="text-center mb-4 font-weight-bold">Profil Pembimbing</h2>
    <div class="card shadow-sm border-0 rounded-lg mb-5 p-4">
        <div class="card-body d-flex align-items-center">
            <div class="text-center me-4">
                @if(isset($pembimbing) && $pembimbing->profile_picture)
                    <img src="{{ asset('storage/profile_pictures/' . $pembimbing->profile_picture) }}" 
                         class="rounded-circle border" width="150" alt="Foto Profil">
                @else
                    <img src="{{ asset('images/profile/default.png') }}" 
                         class="rounded-circle border" width="150" alt="Foto Profil">
                @endif
            </div>
            <div>
                <h4 class="fw-bold mb-1">{{ $pembimbing->name ?? 'Nama tidak tersedia' }}</h4>
                <p class="mb-1"><strong>Email:</strong> {{ $pembimbing->email ?? 'Tidak tersedia' }}</p>
                <p class="mb-1"><strong>No. Telepon:</strong> {{ $pembimbing->phone ?? 'Tidak tersedia' }}</p>
                <p class="mb-1"><strong>Major:</strong> {{ $pembimbing->major ?? 'Tidak tersedia' }}</p>
                <p class="mb-0"><strong>Universitas:</strong> {{ $pembimbing->institution ?? 'Tidak tersedia' }}</p>
            </div>
        </div>
    </div>

    <!-- Daftar Peserta Magang -->
    <h2 class="text-center mb-4 font-weight-bold">Daftar Peserta Magang</h2>
    <div class="card shadow-sm border-0 rounded-lg p-4">
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>CV</th>
                        <th>Formulir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                @if ($user->upload && $user->upload->cv)
                                    <button class="btn btn-sm btn-primary" 
                                            onclick="previewPdf('{{ route('preview.pdf', ['filename' => $user->upload->cv]) }}')">
                                        Lihat CV
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Belum diunggah</button>
                                @endif
                            </td>
                            <td>
                                @if ($user->upload && $user->upload->formulir)
                                    <button class="btn btn-sm btn-primary" 
                                            onclick="previewPdf('{{ route('preview.pdf', ['filename' => $user->upload->formulir]) }}')">
                                        Lihat Formulir
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Belum diunggah</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal untuk Preview PDF -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pratinjau Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="pdfViewer" src="" width="100%" height="600px"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Preview PDF -->
<script>
    function previewPdf(url) {
        document.getElementById('pdfViewer').src = url;
        var modal = new bootstrap.Modal(document.getElementById('pdfModal'));
        modal.show();
    }
</script>

@endsection
