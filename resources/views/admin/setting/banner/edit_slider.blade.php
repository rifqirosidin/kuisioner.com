@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Edit  caption</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">

                                <div class="col-12">
                                    <label for="">Image</label>
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" value="{{ $slider->image }}" class="custom-file-input" id="example-file-input-custom" name="slider" data-toggle="custom-file-input">
                                        <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-select">Status</label>
                                <div class="col-md-12">
                                    <select class="form-control" id="example-select" name="status">
                                        <option disabled selected>Status</option>
                                        <option value="1" {{ $slider->status == 1 ? 'selected':'' }}>Publish</option>
                                        <option value="0" {{ $slider->status == 0 ? 'selected':'' }}>Draft</option>

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-alt-primary float-right">Update</button>
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
