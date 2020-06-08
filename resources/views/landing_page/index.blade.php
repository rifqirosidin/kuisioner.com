@extends('partials.navbar')
@push('css_before')
    <link rel="stylesheet" href="{{ asset('vendor/assets/js/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/js/plugins/slick/slick-theme.css') }}">


@endpush

@section('main-content')

    @include('landing_page.header')
    @include('landing_page.timeline')
    @include('landing_page.testimoni')

@endsection


@push('js')

    <script src="{{ asset('vendor/assets/js/plugins/slick/slick.min.js') }}"></script>

    <!-- Page JS Helpers (Slick Slider plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('slick');
        });</script>
@endpush

