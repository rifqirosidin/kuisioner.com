@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- Normal Form -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Pengaturan Banner</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="">Slider</label>
                                <input type="file" class="form-control" name="slider[]" id="slider" multiple>

                            </div>


                            <div id="slider-form">

                            </div>
                            <div class="d-flex">
                                <p class="font-weight-bold font-size-sm text-primary mr-10" id="add-slider"
                                   style="cursor: pointer">Tambah</p>

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

@endsection
@push('js')
    <script>
        var id = 1;
        $("#add-slider").click(function () {

            $("#slider-form").append(`<div class="row slider">
                                    <div class="col">
                                        <div class="form-group">

                                           <input type="file" class="form-control" name="slider[]" id="slider" multiple>

                                         </div>
                                    </div>
                                    <div class="col-1 align-self-center mr-20 p-0">
                                            <p  class="font-weight-bold font-size-sm text-danger m-0 text-left remove-slider" id="remove-slider" style="cursor: pointer;">Hapus</p>
                                    </div>
                                            </div>`);


        });

        $("#slider-form").on('click', '.remove-slider', function (e) {
            console.log("klik");
            e.preventDefault();
            $(this).parent('div').parent('div').remove()


        })


    </script>
@endpush
