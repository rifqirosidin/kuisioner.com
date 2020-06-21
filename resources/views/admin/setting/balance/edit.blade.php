@extends('dashboard.layouts.app')
@section('content-dashboard')

    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Edit harga saldo</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('price-balances.update', $priceBalance->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="text" class="form-control" value="{{ $priceBalance->price }}" name="price" id="price">
                            </div>
                            <div class="form-group">
                                <label for="amount_balance">Jumlah Saldo</label>
                                <input type="text" value="{{ $priceBalance->amount_balance }}" class="form-control"name="amount_balance" id="amount_balance">
                            </div>
                            <div class="form-group">
                                <button type="submit"c class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
