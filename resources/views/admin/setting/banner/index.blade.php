@extends('dashboard.layouts.app')
@section('content-dashboard')
    <div class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h4>Caption</h4>
                    </div>
                    <div class="block-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-vcenter">
                                <thead>
                                <tr>
                                    <th class="text-center" width="8%"></th>
                                    <th>Title</th>
                                    <th width="">Deskripsi</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($banners as $banner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->description }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('banners.edit', $banner->id) }}"
                                                        class="btn btn-sm btn-secondary js-tooltip-enabled"
                                                        data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button type="button" onclick="removeCaption('{{ $banner->id }}')"
                                                        class="btn btn-sm btn-secondary js-tooltip-enabled"
                                                        data-toggle="tooltip" title="" data-original-title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="font-weight-bold text-center" colspan="5">Tidak Ada data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Create a caption</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('banners.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="row mb-5">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-alt-primary float-right">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h4>Image Slider</h4>
                    </div>
                    <div class="block-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-vcenter">
                                <thead>
                                <tr>
                                    <th class="text-center" width="8%"></th>
                                    <th>Image</th>
                                    <th width="15%">Status</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sliders as $slider)

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img class="img-fluid" height="80" width="100" src="{{ asset('storage/' . $slider->image) }}"
                                                     alt="">
                                            </td>
                                            <td>
                                                {{ $slider->status != 0 ? "Publish":"Draft" }}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('sliders.edit', $slider->id) }}"
                                                            class="btn btn-sm btn-secondary js-tooltip-enabled"
                                                            data-toggle="tooltip" title="" data-original-title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button type="button" onclick="removeSlider('{{ $slider->id }}')"
                                                            class="remove-slider btn btn-sm btn-secondary js-tooltip-enabled"
                                                            data-toggle="tooltip" title="" data-original-title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                @empty
                                    <tr>
                                        <td class="font-weight-bold text-center" colspan="5">Tidak Ada data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Image Slider</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">

                                <div class="col-12">
                                    <label for="">Image</label>
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input" id="example-file-input-custom" name="slider" data-toggle="custom-file-input">
                                        <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                    </div>
                                    <div class="font-size-xs text-danger">Rekomendasi ukuran height 450px</div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-select">Status</label>
                                <div class="col-md-12">
                                    <select class="form-control" id="example-select" name="status">
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-alt-primary float-right">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

@endsection
@push('js')
    <script>

        function removeSlider(id) {
            let theurl = "{{ route('sliders.destroy', ":sliderId") }}";
            theurl = theurl.replace(":sliderId", id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: theurl,
                        success: function (data) {
                            notify()
                            window.location.href = data

                        },
                        error: function (data) {
                            console.log(data)
                        }
                    })


                }
            })
        }

        function removeCaption(id) {
            let theurl = "{{ route('banners.destroy', ":bannerId") }}";
            theurl = theurl.replace(":bannerId", id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: theurl,
                        success: function (data) {
                            notify();
                            window.location.href = data

                        },
                        error: function (data) {
                            console.log(data)
                        }
                    })


                }
            })
        }

        function notify() {
            jQuery(function(){ Codebase.helpers('notify', {
                align: 'right',             // 'right', 'left', 'center'
                from: 'top',                // 'top', 'bottom'
                type: 'success',               // 'info', 'success', 'warning', 'danger'
                icon: 'fa fa-info mr-5',    // Icon class
                message: '{{ Session::get('success') }}'
            }); })
        }
    </script>
@endpush
