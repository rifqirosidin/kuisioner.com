@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Verifikasi Pembayaran</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Name</th>
                                <th class="d-none d-sm-table-cell">Email</th>
                                <th class="d-none d-sm-table-cell" width="15%">Bukti Pembayaran</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                <th class="text-center" style="width: 15%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="font-w600">{{ $payment->user->name }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $payment->user->email }}</td>
                                    <td><img width="80" height="80" src="{{ asset('storage/' . $payment->proof_of_payment) }}" alt=""></td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge  {{ $payment->task->is_active != '1' ? 'badge-danger': 'badge-success'  }}">
                                            {{ $payment->task->is_active != '1' ? 'Nonactive': 'Active'  }}
                                        </span>

                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex mx-10">
                                            <button class="btn btn-sm btn-success mr-5">Terima</button>
                                            <button class="btn btn-sm btn-danger">Tolak</button>
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
