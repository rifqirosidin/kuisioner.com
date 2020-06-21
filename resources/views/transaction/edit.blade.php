@extends('dashboard.layouts.app')
@section('content-dashboard')
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">Edit Transaction</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('transactions.update', $transaction->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                                <div class="form-group">
                                    <label for="example-nf-email">Amount</label>
                                    <input type="text" class="form-control" value="{{ $transaction->amount }}" id="amount" name="amount">
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="example-select">Methode pembayaran</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="payment_method_id" name="payment_method_id">
                                            @foreach($paymentMethods as $method)
                                            <option value="{{ $method->id }}"
                                            {{ $transaction->payment_method_id == $method->id ? 'selected' :'' }}
                                            >{{ $method->name }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label class="col-12">Bukti pembayran</label>
                                <div class="col-8">
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" value="{{ $transaction->proof_of_payment }}" class="custom-file-input" id="proof_of_payment" name="proof_of_payment" data-toggle="custom-file-input">
                                        <label class="custom-file-label" for="proof_of_payment">Choose file</label>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-alt-primary">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
