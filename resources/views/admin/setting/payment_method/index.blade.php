@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h4>Payment Method</h4>
                    </div>
                    <div class="block-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-vcenter">
                                <thead>
                                <tr>
                                    <th class="text-center" width="8%"></th>
                                    <th>Name</th>
                                    <th>Account Number</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paymentMethods as $paymentMethod)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $paymentMethod->name }}</td>
                                        <td>{{ $paymentMethod->account_number }}</td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('payment-methods.edit', $paymentMethod->id) }}"
                                                   class="btn btn-sm btn-secondary js-tooltip-enabled"
                                                   data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button type="button" onclick="removePaymentMethod('{{ $paymentMethod->id }}')"
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
                        <form action="{{ route('payment-methods.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control" id="title" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="account_number">Account Number</label>
                                <input type="text" class="form-control" id="account_number" name="account_number" required>
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
        function removePaymentMethod(id) {
            let theurl = "{{ route('payment-methods.destroy', ":id") }}";
            theurl = theurl.replace(":id", id);
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
                            console.log(data)
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
