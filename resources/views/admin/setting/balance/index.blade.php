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
                        <h4>Setting price</h4>
                    </div>
                    <div class="block-content">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center" width="8%"></th>
                                <th>Harga</th>
                                <th width="">jumlah Saldo</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prices as $price)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $price->price }}</td>
                                    <td>{{ $price->amount_balance }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('price-balances.edit', $price->id) }}"
                                               class="btn btn-sm btn-secondary js-tooltip-enabled"
                                               data-toggle="tooltip" title="" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="button" onclick="removePriceBalance('{{ $price->id }}')"
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
                <div class="col-md-4">
                    <div class="block block-bordered">
                        <div class="block-header">
                            <h3 class="block-title">Tambah harga saldo</h3>
                        </div>
                        <div class="block-content">
                            <form action="{{ route('price-balances.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="price">Harga</label>
                                    <input type="text" class="form-control"name="price" id="price">
                                </div>
                                <div class="form-group">
                                    <label for="amount_balance">Jumlah Saldo</label>
                                    <input type="text" class="form-control"name="amount_balance" id="amount_balance">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
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
        function removePriceBalance(id) {
            let theUrl = "{{ route('price-balances.destroy', ':Id') }}"
            theUrl = theUrl.replace(':Id', id)

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
