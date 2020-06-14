<div class="row">
    <div class="col-md-12">
        <p class="font-weight-bold font-w400 text-center">Nominal yang harus dibayar</p>
        <h2 class="text-center" id="total">{{ number_format($task->total_cost, 2) }}</h2>

        @foreach($paymentMethods as $method)
            <div class="form-group">
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" value="{{ $method->id }}" id="payment_method_{{ $method->id }}" name="payment_method_id" class="custom-control-input">
                    <label class="custom-control-label" for="payment_method_{{ $method->id }}">{{ $method->name }} {{ $method->account_number }}</label>
                </div>
            </div>
        @endforeach
        <div class="form-group row mt-10">
            <label class="col-12">Bukti Pembayaran</label>
            <div class="col-8">
                <div class="custom-file">
                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                    <input type="file" class="custom-file-input" id="example-file-input-custom" name="proof_of_payment" data-toggle="custom-file-input">
                    <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                </div>
            </div>
        </div>
    </div>
</div>

