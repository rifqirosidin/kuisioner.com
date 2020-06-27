@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">Top up Saldo</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('top-up.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-12" for="amount_balance">Jumlah Saldo</label>
                                <div class="col-lg-8">
                                    <select class="js-select2 form-control" id="amount_balance" name="amount_balance" style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($priceBalances as $balance)
                                            <option value="{{ $balance->amount_balance }}">{{ $balance->amount_balance }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price">price</label>
                                <input type="text" class="form-control col-md-8" name="price" id="price" readonly>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="amount_balance">Methode Pembayaran</label>
                                <div class="col-lg-8">
                                    <select class="js-select2 form-control" id="payment_method_id" name="payment_method_id" style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($paymentMethods as $method)
                                            @if($method->id != 1)
                                                <option value="{{ $method->id }}">{{ $method->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12">Bukti Pembayaran</label>
                                <div class="col-8">
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input" id="example-file-input-custom" name="proof_of_payment" data-toggle="custom-file-input">
                                        <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-alt-primary">Top up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Riwayat Top up</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                            <tr>
                                <th class="text-center" width="8%"></th>
                                <th width="20%">Uang</th>
                                <th width="20%">Jumlah Saldo</th>
                                <th class="d-none d-sm-table-cell" width="10%">status</th>
                                <th class="d-none d-sm-table-cell" style="width: 25%;">date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topUpBalances as $topUp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $topUp->price }}</td>
                                <td>{{ $topUp->amount_balance }}</td>
                                <td>
                                    <span class="badge {{ $topUp->status == 0 ? 'badge-danger':'bagde-success' }}">
                                        {{ $topUp->status == 0 ? 'unverified':'verified' }}
                                    </span>
                                </td>
                                <td>{{ $topUp->created_at_format }}</td>
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
        $("#amount_balance").change(function () {
            let amount = $(this).val()
            console.log(amount)
            $.ajax({
                url: "{{ route('ajax.price-balance') }}",
                type:"POST",
                data: {
                    amount_balance: amount
                },
                success: function (res) {
                    console.log(res)
                    $("#price").val(res.price)
                },
                error: function (res) {
                    console.log(res)
                }
            })
        })
    </script>
@endpush
