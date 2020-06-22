@extends('partials.navbar')
@section('main-content')

    <div class="row mt-50 m-0 justify-content-center">
        <div class="col-md-7">
            <div class="block block-bordered p-3">
                <div class="block-header">
                    <h3 class="block-title font-weight-bold font-size-md text-center">{{ $task->title }}</h3>
                </div>
                <div class="block-content">
                    <form action="{{ route('survey.form', $task->form->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($task->form->formElements as $element)
                                    {{-- text--}}
                                    @if($element->element_type_id == 1)
                                        <div class="form-group">
                                            <label for="title">{{ $element->name }}</label>
                                            <input class="form-control" type="text" name="{{ $element->column_id }}" {{ $element->is_required }}>
                                        </div>
                                        {{-- textarea --}}
                                    @elseif($element->element_type_id == 2)
                                        <div class="form-group">
                                            <label for="{{ $element->name }}">{{ $element->name }}</label>
                                            <textarea name="{{ $element->column_id }}" id="{{ $element->name }}" class="form-control" cols="10" rows="4" {{ $element->is_required }}></textarea>
                                        </div>

                                    @elseif($element->element_type_id == 3)
                                        <div class="form-group row">
                                            <label class="col-12">{{ $element->name }}</label>
                                            <div class="col-12">

                                                    @foreach($element->listOptions as $option)
                                                        <div class="custom-control custom-radio mb-5">
                                                            <input class="custom-control-input" type="radio" name="{{ $element->column_id }}" id="{{ $option->value }}" value="{{ $option->value }}" {{ $element->is_required }}>
                                                            <label class="custom-control-label" for="{{ $option->value }}">{{ $option->value }}</label>
                                                        </div>
                                                    @endforeach


                                            </div>
                                        </div>
                                    {{-- checkbox--}}
                                    @elseif($element->element_type_id == 4)
                                        <div class="form-group row">
                                            <label for="{{ $element->name }}" class="col-12">{{ $element->name }}</label>
                                            <div class="col-12">
                                                    @foreach($element->listOptions as $option)
                                                        <div class="custom-control custom-checkbox mb-5">
                                                            <input class="custom-control-input" type="checkbox" name="{{ $element->column_id}}[]" id="{{ $option->id }}" value="{{ $option->value }}">
                                                            <label class="custom-control-label" for="{{ $option->id }}">{{ $option->value }}</label>
                                                        </div>
                                                     @endforeach

                                            </div>
                                        </div>
                                    @elseif($element->element_type_id == 5)
                                        <div class="form-group row">
                                            <label class="col-12" for="example-select">{{ $element->name }}</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="example-select" name="{{ $element->column_id }}" >
                                                        @foreach($element->listOptions as $option)
                                                             <option value="{{  $option->value }}">{{ $option->value }}</option>
                                                        @endforeach


                                                </select>
                                            </div>
                                        </div>
{{--                                        file--}}
                                    @elseif($element->element_type_id == 6)
                                        <div class="form-group row">
                                            <label class="col-12">{{ $element->name }}</label>
                                            <div class="col-8">
                                                <input type="file" name="{{ $element->column_id }}" {{ $element->is_required }}>
                                            </div>
                                        </div>
{{--                                        date--}}
                                    @elseif($element->element_type_id == 7)
                                        <div class="form-group row">
                                            <label for="{{ $element->name }}" class="col-12">{{ $element->name }}</label>
                                            <div class="col-8">
                                                <input type="date" class="form-control" name="{{ $element->column_id }}" id="{{ $element->name }}" {{ $element->is_required }}>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="row mt-50 mb-20">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-primary text-white float-right col-sm-2">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection
