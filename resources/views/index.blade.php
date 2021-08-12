@extends('welcome')

@section('content')

<div class="title m-b-md">
    Kegiatan Ku
</div>

<div class="links">
    <div>
        <h1>Selamat Datang Di Aplikasi Kegiatan Ku</h1>
    </div>
    <a href="{{route('kegiatan.tampilkan')}}">Cek Kegiatan</a>
</div>

@endsection