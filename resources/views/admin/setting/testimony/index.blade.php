@extends('dashboard.layouts.app')
@push('css_before')
    <link rel="stylesheet" href="{{ asset('vendor/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h4>Testimoni</h4>
                        <a href="{{ route('testimonies.create') }}" class="btn btn-sm btn-outline-primary">Tambah</a>
                    </div>
                    <div class="block-content">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="8%"></th>
                                        <th>Name</th>
                                        <th width="">Content</th>
                                        <th style="width: 10%">Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($testimonies as $testimony)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $testimony->name }}</td>
                                        <td>{{ $testimony->content }}</td>
                                        <td>Active</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('testimonies.edit', $testimony->id) }}"
                                                   class="btn btn-sm btn-secondary js-tooltip-enabled"
                                                   data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button type="button" onclick="removeTestimony('{{ $testimony->id }}')"
                                                        class="remove-slider btn btn-sm btn-secondary js-tooltip-enabled"
                                                        data-toggle="tooltip" title="" data-original-title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

    <script>
        function removeTestimony(id) {
            let theUrl = "{{ route('testimonies.destroy', ':testimonyId') }}"
            theUrl = theUrl.replace(':testimonyId', id)

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
                        url: theUrl,
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
