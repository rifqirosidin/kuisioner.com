@extends('dashboard.layouts.app')
@section('content-dashboard')
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Edit Payment Method</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('payment-methods.update', $paymentMethod->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{ $paymentMethod->name }}" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="account_number">Name</label>
                                <input type="text" class="form-control" value="{{ $paymentMethod->account_number }}" id="account_number" name="account_number" required>
                            </div>

                            <div class="row mb-5">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-alt-primary float-right">Update</button>
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
