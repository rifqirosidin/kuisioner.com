<div class="block block-bordered field-block" data-block_id="1">
    <div class="block-content">
        <div class="form-group pt-0">
            <div class="row">
                <div class="col-9">
                    <div class="form-material floating">
                        <input type="text" name="" data-key_id="1" id="question-1" class="form-control question">
                        <input type="text" class="form-control type-field-question" name="" placeholder="Short Text" value="" disabled>
                        <div class="change_question"></div>
                    </div>
                </div>
                <div class="col-3 align-self-center">
                    <select class="form-control type_form" name="type_form">
                        <option value="shorttext">Short Text</option>
                        <option value="longtext">Long Text</option>
                        <option value="select">Select</option>
                        <option value="radio">Radio</option>
                        <option value="checkbox">Checkbox</option>
                    </select>
                </div>

            </div>

        </div>
    </div>
    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
        <label class="css-control css-control-sm css-control-secondary css-switch">
            <input type="checkbox" class="css-control-input" checked="">
            <span class="css-control-indicator "></span> *Required
        </label>
        <i class="fa fa-trash-o fa-2x float-right btn_remove_field " style="cursor: pointer"></i>
    </div>
</div>

    <div></div>
    <div class="form-material floating d-flex">

        <input type="text" class="form-control">
        <i class="fa fa-close fa-2x"></i>
    </div>

<div id="newOptionRadio" class="mb-5"></div>
<span class="font-size-xs text-primary" id="addNewOptionRadio" style="cursor: pointer">Tambah Pilihan</span>


    <div class="field"></div>

<div class="row mt-5">
   <div class="col-12 ">
       <button id="btn_add_field" class="btn btn-sm btn-outline-primary col-3 float-right" type="button">Tambah</button>
   </div>
</div>

@push('js')
{{--    create element--}}
<script>
    //inisialisasi type form
    const TYPE_TEXT = 'shorttext';
    const TYPE_TEXTAREA = 'longtext';
    const TYPE_SELECT = 'select';
    const TYPE_RADIO = 'radio';
    const TYPE_CHECKBOX = 'checkbox';
    var blockFieldId = 1;

    var template =`<div class="row">
    <div class="col-md-12">
        <div class="block block-bordered px-10">
            <div class="block-title">
                <a href="#" id="btn_remove_field">
                    <i class="fa fa-minus-circle text-danger" id="btn_remove_field" style="cursor: pointer"></i>
                </a>
            </div>
            <div class="block-content pt-0">
                <div class="form-group">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-material floating">
                                <input type="text" name="" id="label" class="form-control">
                                <input type="text" class="form-control" name="" value="" disabled>
                            </div>
                        </div>
                        <div class="col-3 align-self-center">
                            <select class="form-control" name="type_form" id="type_form">
                                <option value="">Short Text</option>
                                <option value="">Long Text</option>
                                <option value="">Select</option>
                                <option value="">Radio</option>
                                <option value="">Checkbox</option>
                            </select>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>`

    //add field
    $("#btn_add_field").click(function (e) {
        $(".field").append(template);
    })

    //remove field
    $(".field-block").on("click", ".btn_remove_field", function (e) {
        $(this).parent('div').parent('div').remove()
    })

    //change type form

    var optionRadioButton = `<div class="form-material floating">
        <input type="text" class="form-control">
    </div>`;

    $(".type_form").change(function (e) {
        let type = $(this).val();
        if (type == TYPE_TEXT){
            $(".type-field").attr('type', 'text');
            $(".type-field-question").attr('placeholder', 'Short Text');
        } else if(type == TYPE_TEXTAREA){
            $(".type-field-question").attr('placeholder', 'Long Text');
        } else if (type == TYPE_RADIO){
           $(".change_question").append(optionRadioButton);
        }

    })

    //radion button
    $("#addNewOptionRadio").click(function (e) {
        $("#newOptionRadio").append(optionRadioButton)
    })

   var html = $(".question").html()
    console.log(html)
</script>

@endpush
