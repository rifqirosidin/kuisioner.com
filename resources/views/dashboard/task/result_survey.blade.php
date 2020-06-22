@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-heading font-weight-bold">
                    <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary float-right">Download csv</button>
                    <i class="si si-note mr-5"></i> Hasil Survey
                </h2>
            </div>

            @foreach($task->form->formElements as $key => $item)
{{--                {{ $key }}--}}
                <div class="col-lg-7">
                    <!-- Autohide Scrollbar -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{ $item->name }}</h3>
                        </div>
                        <div class="block-content" data-toggle="slimscroll" data-height="250px">
                            @foreach($responses[$key] as $value)
                                @foreach($value as $item)
                                    <p>{{ $item }}</p>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <!-- END Autohide Scrollbar -->
                </div>

            @endforeach

        </div>
    </div>
@endsection
@push('js')

    <script src="{{ asset('vendor/assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Page JS Helpers (SlimScroll plugin) -->
    <script>jQuery(function () {
            Codebase.helpers(['slimscroll']);
        });</script>


@endpush
