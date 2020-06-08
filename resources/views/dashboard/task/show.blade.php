@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">

        {!! $task->embed_google_form !!}

    </div>

@endsection
