@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Testimoni</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('testimonies.update', $testimony->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="name">Name</label>
                                <input type="text" value="{{ $testimony->name }}" name="name" class="form-control">
                            </div>
                            <div class="form-group row">
                                <label for="name">Testimoni</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $testimony->content }}</textarea>
                            </div>
                            <div class="row mb-5">
                                <div class="col-12 float-right">
                                    <div class="form-group ">
                                        <button class="btn btn-sm- btn-outline-primary float-right" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
