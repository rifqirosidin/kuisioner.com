@extends('partials.navbar')
@section('main-content')

    <div class="row mt-50 justify-content-center">
        <div class="col-md-6">
            <div class="block block-bordered">
                <div class="block-header">
                    <h3 class="block-title text-center font-weight-bold">Submitted</h3>
                </div>
                <div class="block-content">
                    <p class="font-size-md text-center">{{ isset($form->closing_sentence) ? $form->closing_sentence :'' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
