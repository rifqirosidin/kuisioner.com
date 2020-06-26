@extends('partials.navbar')
@section('main-content')

    <div class="row mt-50 bg-gray-light">
        <div class="col-12">
            <h2 class="content-heading font-weight-bold">
                <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary float-right">View More..</button>
                <i class="si si-note mr-5"></i> Daftar Survey
            </h2>
        </div>
        @foreach($tasks as $task)
            @isset($task->form)
                @if($task->number_of_respondents > $task->total_responses)
                    <div class="col-12">
                        <a class="block block-rounded block-link-shadow" href="{{ route('show.form', $task->id) }}">
                            <div class="block-content block-content-full">
                                <div class="row">
                                    <div class="col-7">
                                        <i class="si si-note font-weight-bold text-muted mr-5"></i> {{ $task->title }}
                                    </div>
                                    <div class="col-2">
                                        {{ $task->user->name }}
                                    </div>
                                    <div class="col-1">
                                        Rp.{{ $task->respondent_fee }}
                                    </div>
                                    <div class="col-2 float-right">
                                       <em class="text-muted"> {{ $task->created_at_format }}</em>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                @endif
            @endisset
        @endforeach
    </div>

@endsection

