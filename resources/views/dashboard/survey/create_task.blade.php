<div class="form-group">
    <div class="form-material floating">
        <input class="form-control" type="text" value="{{ old('title') }}" id="title" name="title">
        <label for="title">Judul</label>
    </div>
</div>
<div class="form-group">
    <div class="form-material floating">
        <input class="form-control" type="number" value="{{ old('number_of_respondents') }}" id="number_of_respondents" name="number_of_respondents">
        <label for="number_of_respondents">Jumlah Responden</label>
    </div>
</div>
<div class="form-group">
    <label for="" class="mb-2 mt-10">Jenis Kelamin</label>
    <div class="custom-control custom-radio mb-2">
        <input type="radio" id="gender" value="laki-laki" name="gender" class="custom-control-input">
        <label class="custom-control-label" for="gender">Laki - Laki</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="gender1" value="perempuan" name="gender" class="custom-control-input">
        <label class="custom-control-label" for="gender1">Perempuan</label>
    </div>
</div>
<div class="form-group">
    <div class="form-material floating">
        <input class="form-control" value="{{ old('city') }}" type="text" id="city" name="city">
        <label for="city">Kota</label>
    </div>
    <span class="font-size-xs mt-2">Optional</span>
</div>

<div class="form-group">
    <div class="form-material floating">
        <textarea name="description" id="description" cols="30" class="form-control" rows="5">{{ old('description') }}</textarea>
        <label for="description">Deskripsi</label>
    </div>
</div>
<div class="form-group">
    <div class="form-material floating">
        <input class="form-control" type="text" value="{{ old('respondent_fee') }}" id="respondent_fee" name="respondent_fee">
        <label for="respondent_fee">Insentif Responden</label>
    </div>
    <span class="text-danger">note: per orang</span>
</div>
<div class="form-group">
    <div class="form-material floating">
        <input class="form-control" value="{{ old('total_cost') ?? '' ? old('total_cost'): 0 }}"
               type="text" id="total_cost" name="total_cost" readonly="true">
        <label for="total_cost">Total Biaya</label>
    </div>
    <span class="text-danger">Total biaya: jumlah responden * insentif responden + 5%</span>
</div>

@push('js')
    <script>
        $(document).ready(function () {
            $('#respondent_fee').blur(function (e) {
                let respondenFee = $(this).val();
                let numberOfResponden = $("#number_of_respondents").val()
                let subTotal = respondenFee * numberOfResponden;
                let costAdmin = subTotal * 0.05;
                let totalCost = subTotal + costAdmin
                $("#total_cost").val(totalCost)
            })

        })

        $('#number_of_respondents').blur(function (e) {

            let respondenFee = $("#respondent_fee").val();
            let numberOfResponden = $(this).val()
            let subTotal = respondenFee * numberOfResponden;
            let costAdmin = subTotal * 0.05;
            let totalCost = subTotal + costAdmin
            $("#total_cost").val(totalCost)

        })

            $("#next").click(function () {
                let total = $("#total_cost").val()
                console.log(total)
                $("#total").html(total)
                $("#total").text(total)
            })

    </script>
@endpush
