@extends('layouts.codebase')
@section('content')
    

    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
        <aside id="side-overlay">
            @include('dashboard.partials.header')
            {{--            @include('dashboard.partials.content')--}}
        </aside>
        @include('dashboard.partials.sidebar')
        @include('dashboard.partials.navbar')
        <main id="main-container" style="min-height: 531px;">
            @yield('content-dashboard')
        </main>

        @include('dashboard.partials.footer')
    </div>

    @push('js')
        <script src="{{ asset('vendor/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page JS Code -->
        <script src="{{ asset('vendor/assets/js/pages/be_tables_datatables.min.js') }}"></script>
    @endpush
@endsection

