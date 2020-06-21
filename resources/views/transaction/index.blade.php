@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Transaksi</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Judul</th>

                                <th class="d-none d-sm-table-cell" width="15%">Bukti Pembayaran</th>
                                <th class="d-none d-sm-table-cell" width="15%">Metode Pembayaran</th>
                                <th class="d-none d-sm-table-cell" width="10%">Jumlah uang</th>
                                <th class="d-none d-sm-table-cell" style="width: 10%;">Status</th>
                                <th class="d-none d-sm-table-cell" style="width: 10%;">dibuat</th>
                                <th class="text-center" style="width: 15%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="font-w600">{{ $payment->task->title}}</td>

                                    <td><img width="80" height="80" src="{{ asset('storage/' . $payment->proof_of_payment) }}" alt=""></td>
                                    <td>{{ $payment->paymentMethod->name }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $payment->amount }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge  {{ $payment->status != 'verified' ? 'badge-danger': 'badge-success'  }}">
                                            {{ $payment->status  }}
                                        </span>

                                    </td>
                                    <td>{{ $payment->created_at_format }}</td>
                                    <td class="text-center">
                                        <div class="d-flex mx-10">
                                            <a href="{{ route('transactions.edit', $payment->id) }}" class="btn btn-sm btn-success mr-5">Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger delete" data-payment_id="{{ $payment->id }}">Hapus</button>
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

        jQuery('.delete').on('click', e => {
            let paymentId = $(".delete").data('payment_id')
            toast({
                title: 'Apakah anda yakin?',
                text: 'Mengapus transaksi ini!',
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

                    ajaxDeletePayment(paymentId)
                    // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                } else if (result.dismiss === 'cancel') {
                    toast('Cancelled', 'Your imaginary file is safe :)', 'error');
                }
            });
        });

        function ajaxDeletePayment(id) {
            let URL = "{{ route('transactions.destroy', ':paymentId') }}"
            URL = URL.replace(':paymentId', id)
            $.ajax({
                type:"delete",
                url: URL,
                success: function (data) {
                    window.location.href = data
                },
                error: function (data) {
                    console.log(data)
                }
            })
        }
    </script>
@endpush
