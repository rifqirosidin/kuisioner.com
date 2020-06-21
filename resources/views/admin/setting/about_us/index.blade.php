@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h4>Caption</h4>
                        @if(count($aboutUs) < 1)
                            <a href="{{ route('about-us.create') }}" class="btn btn-sm btn-alt-primary">Tambah</a>
                        @endif
                    </div>
                    <div class="block-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-vcenter">
                                <thead>
                                <tr>
                                    <th>Konten</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($aboutUs as $about)
                                    <tr>
                                        <td>{{ $about->content }}</td>
                                        <td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('about-us.edit', $about->id) }}"
                                                   class="btn btn-sm btn-secondary js-tooltip-enabled"
                                                   data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button type="button"
                                                        class="remove-content btn btn-sm btn-secondary js-tooltip-enabled"
                                                        data-toggle="tooltip" data-about_us_id="{{ $about->id }}" title="" data-original-title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
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

        </div>
    </div>
@endsection
@push('js')

    <script>
        jQuery('.remove-content').on('click', e => {
            let aboutId = $(".remove-content").data('about_us_id')

            toast({
                title: 'Apakah anda yakin?',
                text: 'Menghapus data ini!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d26a5c',
                confirmButtonText: 'Delete!',
                html: false,
                preConfirm: e => {
                    return new Promise(resolve => {
                        setTimeout(() => {
                            resolve();
                        }, 50);
                    });
                }
            }).then(result => {
                if (result.value) {

                    ajaxVerifyPayment(aboutId)
                    // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                } else if (result.dismiss === 'cancel') {
                    toast('Cancelled', 'Your imaginary file is safe :)', 'error');
                }
            });
        });

        function ajaxVerifyPayment(id) {
            let URL = "{{ route('about-us.destroy', ':aboutId') }}"
            URL = URL.replace(':aboutId', id)
            $.ajax({
                type:"delete",
                url: URL,
                success: function (data) {
                    window.location.href = data
                },
                error: function (data) {

                }
            })
        }
    </script>
@endpush
