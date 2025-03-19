@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>{{ $title }}</h2>
    <p>Hubungi kami melalui email atau telepon:</p>
    <ul>
        <li>Email: <a href="mailto:{{ $email }}">{{ $email }}</a></li>
        <li>Telepon: {{ $phone }}</li>
        <li>Alamat: {{ $address }}</li>
    </ul>
</div>
@endsection
