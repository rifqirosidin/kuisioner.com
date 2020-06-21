@extends('partials.navbar')
@section('main-content')

    <div class="row mt-50">

        <h4>Tentang Kami</h4>
        <p>{{ $aboutUs->content }}</p>
    </div>
@endsection
