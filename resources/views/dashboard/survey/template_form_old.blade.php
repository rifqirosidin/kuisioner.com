<div class="field">
    <div>
        <div class="block block-bordered ">
            <div class="block-content">
                <div class="form-group pt-0">
                    <div class="row">
                        <div class="col-9">
                            <div class="field-question"  id="field_1">
                                <div class="form-material floating change_question" id="questionId-1">
                                    <input type="text" name="label-1" class="form-control question">
                                    <input type="text" class="form-control type-field-question" data-key="1" name="question-1" placeholder="Short Text" value="" disabled>

                                </div>
                            </div>

                        </div>
                        <div class="col-3 align-self-center">
                            <select class="form-control type_form" name="type_form" id="type_form-1">
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
                    <input type="checkbox" id="required-1" class="css-control-input" checked="">
                    <span class="css-control-indicator "></span> *Required
                </label>
                <i class="fa fa-trash-o fa-2x float-right btn_remove_field" style="cursor: pointer"></i>
            </div>
        </div>
    </div>
    <div>
        <div class="block block-bordered ">
            <div class="block-content">
                <div class="form-group pt-0">
                    <div class="row">
                        <div class="col-9">
                            <div class="field-question"  id="field_2">
                                <div class="form-material floating change_question" id="questionId-1">
                                    <input type="text" name="label-1" class="form-control question">
                                    <input type="text" class="form-control type-field-question" data-key="1" name="question-1" placeholder="Short Text" value="" disabled>

                                </div>
                            </div>

                        </div>
                        <div class="col-3 align-self-center">
                            <select class="form-control type_form" name="type_form" id="type_form-1">
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
                    <input type="checkbox" id="required-1" class="css-control-input" checked="">
                    <span class="css-control-indicator "></span> *Required
                </label>
                <i class="fa fa-trash-o fa-2x float-right btn_remove_field" style="cursor: pointer"></i>
            </div>
        </div>
    </div>

</div>
<div>

</div>




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
    var questionId = 1;


    //add field
    $("#btn_add_field").click(function (e) {
        ++questionId

        $(".field").append(`<div>
        <div class="block block-bordered ">
            <div class="block-content">
                <div class="form-group pt-0">
                    <div class="row">
                        <div class="col-9">
                            <div>
                                <div class="form-material floating change_question" id="questionId-${questionId}">
                                    <input type="text" name="lebel-${questionId}" class="form-control question">
                                    <input type="text" class="form-control type-field-question" data-key="${questionId}" name="question-${questionId}" placeholder="Short Text" value="" disabled>
                                    <div class="change_question"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 align-self-center">
                            <select class="form-control type_form" name="type_form-${questionId}" id="type_form-${questionId}">
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
                    <input type="checkbox" id="required-${questionId}" class="css-control-input" checked="">
                    <span class="css-control-indicator "></span> *Required
                </label>
                <i class="fa fa-trash-o fa-2x float-right btn_remove_field" style="cursor: pointer"></i>
            </div>
        </div>
    </div>`);
    })

    //remove field
    $(".field").on("click", ".btn_remove_field", function (e) {
        e.preventDefault()

        $(this).parent('div').parent('div').parent('div').remove()
    })

    //change type form

    var label = `<div class="form-material floating">
        <input type="text" name="question[]" class="form-control">
    </div>`;

    $(".field").on("click", ".type_form", function (e) {
        e.preventDefault()

       let id  = $(this).parent('div').next().next().attr("id")
        console.log(id)
        $(".type_form").change(function (e) {

            let type = $(this).val();
            if (type == TYPE_TEXT){
                $("#change_question-+i").html(`<div class="form-material floating change_question" id="">
                                    <input type="text" name="" class="form-control question">
                                    <input type="text" class="form-control type-field-question" name="" placeholder="Short Text" value="" disabled>

                            </div>`)
            } else if(type == TYPE_TEXTAREA){
                $(".change_question").html(`<div class="form-material floating change_question">
                                    <input type="text" name="" class="form-control question">
                                    <input type="text" class="form-control type-field-question" name="" placeholder="Long Text" value="" disabled>

                            </div>`)
            } else if (type == TYPE_RADIO){
                $("#change_question-+i").html(`
                                        <div class="form-material floating d-flex">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="radio-block">
                                            <div class="d-flex mt-3">
                                                <label class="css-control css-control-sm css-control-secondary css-radio">
                                                    <input type="radio" class="css-control-input " name="radio-group7">
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                                <input type="text" class="radio-option" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
                                                <i class="fa fa-close font-size-md align-self-center remove-option" style="cursor: pointer"></i>
                                            </div>


                                            <div id="newOptionRadio" class="mb-5"></div>
                                            <div class="font-size-xs text-primary ml-4 addNewOptionRadio" id="addNewOptionRadio" style="cursor: pointer">Tambah Pilihan</div>
                                    </div>`);
            }

        })
    })








    //radion button
    $(".change_question").on('click','#addNewOptionRadio',function (e) {
        $("#newOptionRadio").append(`<div class="d-flex mt-3">
                <label class="css-control css-control-sm css-control-secondary css-radio">
                    <input type="radio" class="css-control-input " name="radio-group7">
                    <span class="css-control-indicator"></span>
                </label>
                <input type="text" class="radio-option" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
                <i class="fa fa-close font-size-md align-self-center remove-option" style="cursor: pointer"></i>
            </div>`)

    })
    //remove option radio
    $(".change_question").on('click', '.remove-option', function (e) {
        console.log('klik remove')
        $(this).parent('div').remove()
    })


</script>


@endpush
