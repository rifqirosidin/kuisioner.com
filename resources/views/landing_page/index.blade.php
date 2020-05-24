@extends('partials.navbar')
@push('css_before')
    <link rel="stylesheet" href="{{ asset('vendor/assets/js/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/js/plugins/slick/slick-theme.css') }}">


@endpush

@section('main-content')

    @include('partials.header')

@endsection


@push('js')

    <script src="{{ asset('vendor/assets/js/plugins/slick/slick.min.js') }}"></script>

    <!-- Page JS Helpers (Slick Slider plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('slick');
        });</script>
@endpush

