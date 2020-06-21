@extends('dashboard.layouts.app')

@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">Edit About Us</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('about-us.update', $aboutUs->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $aboutUs->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-alt-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
