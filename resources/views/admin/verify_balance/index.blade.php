@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Verifikasi Saldo</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th class="d-none d-sm-table-cell" width="15%">User</th>
                                <th class="d-none d-sm-table-cell" width="15%">Image</th>
                                <th class="d-none d-sm-table-cell" width="15%">Uang</th>
                                <th class="d-none d-sm-table-cell" width="10%">Jumlah Saldo</th>
                                <th class="d-none d-sm-table-cell" width="15%">Metode Pembayaran</th>
                                <th class="d-none d-sm-table-cell" style="width: 10%;">Status</th>
                                <th class="text-center" style="width: 15%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topUps as $topUp)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="font-w600">{{ $topUp->user->name }}</td>

                                    <td><img width="80" height="80" src="{{ asset('storage/' . $topUp->proof_of_payment) }}" alt=""></td>
                                    <td>{{ $task->payment->paymentMethod->name }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $topUp->price }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $topUp->amount_price }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $topUp->paymentMethod->name }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge  {{ $topUp->status != 1 ? 'badge-danger': 'badge-success'  }}">
                                            {{ $topUp->status  }}
                                        </span>

                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex mx-10">
                                            <button type="button" class="btn btn-sm btn-success mr-5 receive js-swal-confirm" data-task_id="{{ $topUp->id }}">Terima</button>
                                            <button type="button" class="btn btn-sm btn-danger reject" data-task_id="{{ $topUp->id }}">Tolak</button>
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


        jQuery('.receive').on('click', e => {
            let taskId = $(".receive").data('task_id')
            console.log(taskId)
            const TYPE = 'receive';
            toast({
                title: 'Apakah anda yakin?',
                text: 'Menerima bukti pembayaran ini!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d26a5c',
                confirmButtonText: 'Terima!',
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

                    ajaxVerifyPayment(taskId, TYPE)
                    // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                } else if (result.dismiss === 'cancel') {
                    toast('Cancelled', 'Your imaginary file is safe :)', 'error');
                }
            });
        });


        jQuery('.reject').on('click', e => {
            let taskId = $(".reject").data('task_id')
            const TYPE = 'reject';
            toast({
                title: 'Apakah anda yakin?',
                text: 'Menolak bukti pembayaran ini!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d26a5c',
                confirmButtonText: 'Tolak!',
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
                    ajaxVerifyPayment(taskId, TYPE)
                    // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                } else if (result.dismiss === 'cancel') {
                    toast('Cancelled', 'Your imaginary file is safe :)', 'error');
                }
            });
        });
        function ajaxVerifyPayment(id, type) {
            const URL = "{{ route('verify.payment') }}"
            $.ajax({
                type:"patch",
                url: URL,
                data: {
                    task_id: id,
                    type: type
                },
                success: function (data) {
                    window.location.href = data
                },
                error: function (data) {

                }
            })
        }
    </script>
@endpush
