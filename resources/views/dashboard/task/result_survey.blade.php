@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row justify-content-start">
            <div class="col-12">
                <h3 class="content-heading font-weight-bold">
                    <a download="result_survey.csv" href="#" class="btn btn-sm btn-rounded btn-alt-secondary float-right" onclick="return ExcellentExport.csv(this, 'datatable');">Download csv</a>
                    <i class="si si-note mr-5"></i> Hasil Survey
                </h3>
            </div>
            @isset($task)
            <div class="col-md-7">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">Detail Form</h3>
                    </div>
                    <div class="block-content">
                     <p class="font-weight-bold">Target Responden: {{ $task->number_of_respondents }}</p>
                     <p class="font-weight-bold">Responden: {{ $totalResponses }}</p>
                    </div>
                </div>
            </div>

            @foreach($task->form->formElements as $key => $item)
                <div class="col-lg-7">
                    <!-- Autohide Scrollbar -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{ $item->name }}</h3>
                        </div>
                        <div class="block-content" data-toggle="slimscroll" data-height="250px">
                            @if($item->element_type_id != 4)
                                @foreach($responses[$key] as $value)
                                    @foreach($value as $item)
                                        <p>{{ $item }}</p>
                                    @endforeach
                                @endforeach
                            @else
                                @foreach($responses[$key] as $id => $value)
                                    @foreach($value as $item)
                                        @foreach($item as $value)
                                        <p>{{ $value }}</p>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- END Autohide Scrollbar -->
                </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-12">
                <table border="1" id="datatable" class="d-none">
                    <thead>
                        @foreach($task->form->formElements as $key => $item)
                            <th>{{ $item->name }}</th>
                        @endforeach
                    </thead>
                    <tbody>
                        @foreach($collect as $value)
                            <tr>
                                @foreach($value as $item)
                                    @if(is_array($item))
                                        <td>
                                            @foreach($item as $data)
                                                {{ $data . "," }}
                                            @endforeach
                                        </td>
                                    @else
                                        <td>{{ $item }}</td>
                                    @endif

                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endisset


    </div>
@endsection
@push('js')

    <script src="{{ asset('vendor/assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('vendor\assets\js\excellentexport.js') }}"></script>

    <!-- Page JS Helpers (SlimScroll plugin) -->
    <script>jQuery(function () {
            Codebase.helpers(['slimscroll']);
        });</script>



@endpush
