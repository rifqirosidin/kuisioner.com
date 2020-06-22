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
        <div class="col-12">
            <a class="block block-rounded block-link-shadow" href="{{ route('show.form', $task->id) }}">
                <div class="block-content block-content-full">
                    <p class="font-size-sm text-muted float-sm-right mb-5"><em>{{ $task->created_at_format }}</em></p>
                    <h4 class="font-size-default text-primary mb-0">
                        <i class="si si-note text-muted mr-5"></i> {{ $task->title }}
                    </h4>
                </div>
            </a>
        </div>

        @endforeach

@endsection

