@extends('index')
@section('title', 'Halaman Utama')
@section('landing-page')
    <div class="content">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="info"></div>
            <div class="img">
                <img src="{{ url('/image/sumenep.png') }}" alt="logo">
            </div>
        </div>
    </div>
@endsection
