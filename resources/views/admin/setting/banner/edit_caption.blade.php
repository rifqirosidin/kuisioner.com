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
                        <form action="{{ route('banners.update', $banner->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" value="{{ $banner->title }}" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control" value="{{ $banner->description }}" id="description" name="description">
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
