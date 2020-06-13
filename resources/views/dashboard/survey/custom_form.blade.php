<div class="field">
    <div>
        <div class="block block-bordered ">
            <div class="block-content">
                <div class="form-group pt-0">
                    <div class="row">
                        <div class="col-9">
                                <div class="form-material floating change_question" id="change_question-1">
                                    <input type="text" name="label-question[]" class="form-control question">
                                    <input type="text" class="form-control type-field-question" value="text" name="element_type[]" readonly>

                                </div>

                        </div>
                        <div class="col-3 align-self-center">
                            <select  class="form-control type_form-1" name="type_form" onchange="changeFormElement(this.id);" id="1">
                                <option value="shorttext">Text</option>
                                <option value="longtext">TextArea</option>
                                <option value="select">Select</option>
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="date">Date</option>
                                <option value="file">File</option>
                            </select>
                        </div>

                    </div>

                </div>
            </div>
            <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                <label class="css-control css-control-sm css-control-secondary css-switch">
                    <input type="checkbox" name="required[]"  class="css-control-input" value="required" checked="">
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
    const TYPE_FILE = 'file';
    const TYPE_DATE = 'date';
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
                                <div class="form-material floating change_question" id="change_question-${questionId}">
                                    <input type="text" name="label-question[]" class="form-control question" data-element_type="text">
                                    <input type="text" class="form-control type-field-question" value="text" name="element_type[]" placeholder="Short Text" >

                                </div>

                        </div>
                        <div class="col-3 align-self-center">
                            <select  class="form-control type_form-${questionId}" name="type_form" onchange="changeFormElement(this.id);" id="${questionId}">
                                <option value="shorttext">Text</option>
                                <option value="longtext">TextArea</option>
                                <option value="select">Select</option>
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="date">Date</option>
                                <option value="file">File</option>
                            </select>
                        </div>

                    </div>

                </div>
            </div>
            <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                <label class="css-control css-control-sm css-control-secondary css-switch">
                    <input type="checkbox" name="required[]"  value="required" class="css-control-input" checked="">
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


   function changeFormElement(elementId){
        let type = $(".type_form-"+elementId).val();
        console.log(type)
        if (type == TYPE_TEXT){
            $("#change_question-"+ elementId).html(`<div class="form-material floating change_question" id="">
                                    <input type="text" name="label-question[]" class="form-control question" data-element_type="text">
                                    <input type="text" class="form-control type-field-question" value="text" placeholder="Text" name="element_type[]" >

                            </div>`)
        } else if(type == TYPE_TEXTAREA){
            $("#change_question-"+elementId).html(`<div class="form-material floating change_question" >
                                    <input type="text" name="label-question[]" class="form-control question" data-element_type="textarea">
                                   <input type="text" class="form-control type-field-question" value="textarea" name="element_type[]" placeholder="TextArea" >
                            </div>`)
        } else if (type == TYPE_RADIO){

            $("#change_question-"+elementId).html(`
                                        <div class="form-material floating d-flex">
                                            <input type="text" name="label-question[]" class="form-control question"  data-element_type="radio">
                                            <input type="hidden" name="element_type[]" class="form-control" value="radio">
                                        </div>
                                        <div class="radio-block-${elementId}">
                                            <div class="d-flex mt-3" id="radio-option-${elementId}">
                                                <label class="css-control css-control-sm css-control-secondary css-radio">
                                                    <input type="radio" class="css-control-input " >
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                                <input type="text" class="radio-option question" name="radio-option_${elementId}[]" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
                                                <i class="fa fa-close font-size-md align-self-center remove-option" onclick="removeRadio(${elementId})"  style="cursor: pointer"></i>
                                            </div>


                                            <div id="newOptionRadio-${elementId}"  class="mb-5"></div>
                                            <div class="font-size-xs text-primary ml-4 addNewOptionRadio" onclick="addOptionRadio(this.id)" id="${elementId}" style="cursor: pointer">Tambah Pilihan</div>
                                    </div>`);
        }else if (type == TYPE_CHECKBOX){
            $("#change_question-"+elementId).html(`<div class="form-material floating d-flex">
                                            <input type="text" name="label-question[]" class="form-control question" data-element_type="checkbox">
                                            <input type="hidden" name="element_type[]" value="checkbox" class="form-control">
                                        </div><div class="checkbox-block">
                                            <div class="d-flex mt-3" id="option-checkbox-${elementId}">
                                                <label class="css-control css-control-sm css-control-primary css-checkbox">
                                                    <input type="checkbox" name="element_type[]" class="css-control-input">
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                                <input type="text" class="checkbox-option question" name="checkbox-option_${elementId}[]" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
                                                <i class="fa fa-close font-size-md align-self-center" onclick="removeCheckbox(${elementId})" style="cursor: pointer"></i>
                                            </div>


                                            <div id="newOptionCheckbox-${elementId}"  class="mb-5"></div>
                                            <div class="font-size-xs text-primary ml-4 addNewOptionCheckbox" onclick="addOptionCheckbox(${elementId})" style="cursor: pointer">Tambah Pilihan</div>
                                        </div>`)
        } else if (type == TYPE_SELECT){
            $("#change_question-"+elementId).html(`<div class="form-material floating d-flex">
                                            <input type="text" name="label-question[]" class="form-control question" data-element_type="select">
                                            <input type="hidden" value="select" name="element_type[]" class="form-control">
                                        </div>
                                        <div class="select-block">
                                            <div class="d-flex mt-3" id="option-select-${elementId}">
                                                <input type="text" class="select-option question" name="select-option_${elementId}[]" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;" placeholder="option">
                                                <i class="fa fa-close font-size-md align-self-center" onclick="removeOptionSelect(${elementId})" style="cursor: pointer" ></i>
                                            </div>

                                            <div id="newOptionSelect-${elementId}"  class="mb-5"></div>
                                            <div class="font-size-xs text-primary" onclick="addOptionSelect(${elementId})" style="cursor: pointer">Tambah Pilihan</div>
                                        </div>`)
        }else if (type == TYPE_DATE){
            $("#change_question-"+elementId).html(`<div class="form-material floating change_question" >
                    <input type="text" name="label-question[]" class="form-control question">
                    <input type="date" class="form-control type-field-question" readonly>
                    <input type="hidden" value="date"  name="element_type[]">

                </div>`)
        }else if (type == TYPE_FILE){
            $("#change_question-"+elementId).html(`<div class="form-material floating change_question" id="change_question-1">
                    <input type="text" name="label-question[]" class="form-control question">
                    <input type="file" class="form-control type-field-question" disabled>
                    <input type="hidden" value="file"  name="element_type[]">

                </div>`)
        }
        return false;
    }

    //add option radio button
    function addOptionRadio(id){
       $("#newOptionRadio-"+id).append(`<div class="d-flex mt-3" id="radio-option-${id}">
                <label class="css-control css-control-sm css-control-secondary css-radio">
                    <input type="radio" class="css-control-input " name="element_type[]">
                    <span class="css-control-indicator"></span>
                </label>
                <input type="text" name="radio-option_${id}[]" class="radio-option question" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
                <i class="fa fa-close font-size-md align-self-center remove-option" onclick="removeRadio(${id})" style="cursor: pointer"></i>
            </div>`)
        return false;
    }

    function removeRadio(id) {
       $("#radio-option-"+id).remove()
    }
    //add option checkbox
    function addOptionCheckbox(id) {
        $("#newOptionCheckbox-"+id).append(`<div class="checkbox-block">
                                            <div class="d-flex mt-3" id="option-checkbox-${id}">
                                                <label class="css-control css-control-sm css-control-primary css-checkbox">
                                                    <input type="checkbox" class="css-control-input">
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                                <input type="text" name="checkbox-option_${id}[]" class="checkbox-option question" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
                                                <i class="fa fa-close font-size-md align-self-center" onclick="removeCheckbox(${id})" style="cursor: pointer"></i>
                                            </div>

                                        </div>`)
    }

    //remove option checkbox
    $(".change_question").on('click', '.remove-option-checkbox', function (e) {
        $(this).parent('div').remove()
    })
    function removeCheckbox(id) {
        $("#option-checkbox-"+id).remove();
    }

    //add option select
    function addOptionSelect(id) {

        $("#newOptionSelect-"+id).append(` <div class="d-flex mt-3" id="option-select-${id}">
                                                <input type="text" class="select-option question" name="select-option_${id}[]" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;" placeholder="option">
                                                <i class="fa fa-close font-size-md align-self-center" onclick="removeOptionSelect(${id})" style="cursor: pointer" ></i>
                                            </div>`)

    }

    //remove option select
    function removeOptionSelect(id) {
        $("#option-select-"+id).remove();

    }
</script>
<script>
    $("button[type='submit']").click(function (e) {
        e.preventDefault()
        let display = 1
        let fieldEmpty = 0;
        $(".question").each(function (i) {
            if ($(this).val() == "" && display == 1) {
                display++
                fieldEmpty++
                alert("Semua Field tidak boleh kosong")

            }

        })
        if (fieldEmpty <= 0){
            $("#form-survey").submit()
        }

    })
</script>
@endpush
