<div class="field">
    <div>
        <div class="block block-bordered ">
            <div class="block-content">
                <div class="form-group pt-0">
                    <div class="row">
                        <div class="col-9">
                                <div class="form-material floating change_question" id="change_question-1">
                                    <input type="text" name="label-question" class="form-control question" data-element_type="text">
                                    <input type="text" class="form-control type-field-question" value="text" name="question" placeholder="Text" disabled>

                            </div>

                        </div>
                        <div class="col-3 align-self-center">
                            <select  class="form-control type_form-1" name="type_form" onchange="changeFormElement(this.id);" id="1">
                                <option value="shorttext">Text</option>
                                <option value="longtext">TextArea</option>
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
                    <input type="checkbox" id="required" class="css-control-input" value="required" checked="">
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
                                <div class="form-material floating change_question" id="change_question-${questionId}">
                                    <input type="text" name="label-question" class="form-control question" data-element_type="text">
                                    <input type="text" class="form-control type-field-question" value="text" name="question" placeholder="Short Text" disabled>

                            </div>

                        </div>
                        <div class="col-3 align-self-center">
                            <select  class="form-control type_form-${questionId}" name="type_form" onchange="changeFormElement(this.id);" id="${questionId}">
                                <option value="shorttext">Text</option>
                                <option value="longtext">TextArea</option>
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
                    <input type="checkbox" id="required"  value="required" class="css-control-input" checked="">
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
                                    <input type="text" name="label-question" class="form-control question" data-element_type="text">
                                    <input type="text" class="form-control type-field-question" value="text" placeholder="Text" name="question" disabled>

                            </div>`)
        } else if(type == TYPE_TEXTAREA){
            $("#change_question-"+elementId).html(`<div class="form-material floating change_question" >
                                    <input type="text" name="label-question" class="form-control question" data-element_type="textarea">
                                   <input type="text" class="form-control type-field-question" value="textare" name="question" placeholder="TextArea" disabled>
                            </div>`)
        } else if (type == TYPE_RADIO){

            $("#change_question-"+elementId).html(`
                                        <div class="form-material floating d-flex">
                                            <input type="text" name="label-question" class="form-control"  data-element_type="radio">
                                        </div>
                                        <div class="radio-block-${elementId}">
                                            <div class="d-flex mt-3" id="radio-option-${elementId}">
                                                <label class="css-control css-control-sm css-control-secondary css-radio">
                                                    <input type="radio" class="css-control-input " >
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                                <input type="text" class="radio-option" name="radio-option" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
                                                <i class="fa fa-close font-size-md align-self-center remove-option" onclick="removeRadio(${elementId})"  style="cursor: pointer"></i>
                                            </div>


                                            <div id="newOptionRadio-${elementId}"  class="mb-5"></div>
                                            <div class="font-size-xs text-primary ml-4 addNewOptionRadio" onclick="addOptionRadio(this.id)" id="${elementId}" style="cursor: pointer">Tambah Pilihan</div>
                                    </div>`);
        }else if (type == TYPE_CHECKBOX){
            $("#change_question-"+elementId).html(`<div class="form-material floating d-flex">
                                            <input type="text" name="label-question" class="form-control" data-element_type="checkbox">
                                        </div><div class="checkbox-block">
                                            <div class="d-flex mt-3" id="option-checkbox-${elementId}">
                                                <label class="css-control css-control-sm css-control-primary css-checkbox">
                                                    <input type="checkbox" name="question" class="css-control-input">
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                                <input type="text" class="checkbox-option" name="checkbox-option" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
                                                <i class="fa fa-close font-size-md align-self-center" onclick="removeCheckbox(${elementId})" style="cursor: pointer"></i>
                                            </div>


                                            <div id="newOptionCheckbox-${elementId}"  class="mb-5"></div>
                                            <div class="font-size-xs text-primary ml-4 addNewOptionCheckbox" onclick="addOptionCheckbox(${elementId})" style="cursor: pointer">Tambah Pilihan</div>
                                        </div>`)
        } else if (type == TYPE_SELECT){
            $("#change_question-"+elementId).html(`<div class="form-material floating d-flex">
                                            <input type="text" name="label-question" class="form-control" data-element_type="select">
                                        </div>
                                        <div class="select-block">
                                            <div class="d-flex mt-3" id="option-select-${elementId}">
                                                <input type="text" class="select-option" name="select-option" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;" placeholder="option">
                                                <i class="fa fa-close font-size-md align-self-center" onclick="removeOptionSelect(${elementId})" style="cursor: pointer" ></i>
                                            </div>

                                            <div id="newOptionSelect-${elementId}"  class="mb-5"></div>
                                            <div class="font-size-xs text-primary" onclick="addOptionSelect(${elementId})" style="cursor: pointer">Tambah Pilihan</div>
                                        </div>`)
        }
        return false;
    }

    //add option radio button
    function addOptionRadio(id){
       $("#newOptionRadio-"+id).append(`<div class="d-flex mt-3" id="radio-option-${id}">
                <label class="css-control css-control-sm css-control-secondary css-radio">
                    <input type="radio" class="css-control-input " name="question">
                    <span class="css-control-indicator"></span>
                </label>
                <input type="text" name="radio-option" class="radio-option" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
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
                                                <input type="text" name="checkbox-option" class="checkbox-option" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;">
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
                                                <input type="text" class="select-option" name="select-option" style="outline: 0; border-width: 0 0 2px; border-color:  #d4dae3; width: 250px;" placeholder="option">
                                                <i class="fa fa-close font-size-md align-self-center" onclick="removeOptionSelect(${id})" style="cursor: pointer" ></i>
                                            </div>`)

    }

    //remove option select
    function removeOptionSelect(id) {
        $("#option-select-"+id).remove();

    }
</script>

    store database
<script>
    let URL = "{{ route('surveys.store', request('taskId')) }}"
    const TAKS_ID = "{{ request('taskId') }}";
    let FORM_ID = ""
    let ELEMENT_ID = ""
    $(" button[type='submit']").click(function (e) {
        e.preventDefault();
        let closingSentence = $(" textarea[name='closing_sentence']").val()

        ajaxForm(TAKS_ID, closingSentence)

        $(" input[name='label-question'], select[name='label-question']").each(function (i) {
            //inisialisai
            let label = $(this).val();
            let elementType = $(this).data('element_type')
            let columnId = i+1;
            let required = ""
            //check required element
            if ($("#required").is(':checked')){
                required = $("#required").val();

            }

            //insert to database
            ajaxFormElement(TAKS_ID,columnId, label, elementType, required)

            optionElement(columnId, elementType,TAKS_ID, columnId)
        })


    })

    function ajaxForm(taskId, closingSentence) {
        $.ajax({
            type:"post",
            url: "{{ route('create.form') }}",
            dataType: "json",
            data:{
                task_id: taskId,
                closing_sentence: closingSentence
            },
            success: function (res) {

            },
            error: function (data) {
                console.log(data)
            }
        })

    }

   function ajaxFormElement(taskId,columnId, label, type, required) {
        $.ajax({
            type: "POST",
            url: URL,
            dataType:"JSON",
            data: {
                task_id: taskId,
                column_id: columnId,
                name: label,
                element_type: type,
                is_required: required,
            },
            success: function (res) {
                console.log("form element sukses")
            },
            error: function (data) {
                console.log("form element error")
                console.log(data)
            }

        })
    }
    function ajaxOptionElement(value, type, taskId, columnId) {
        console.log("option begin")
        $.ajax({
            type: "POST",
            url: URL,
            dataType: "JSON",
            data: {
                task_id: taskId,
                column_id: columnId,
                option_value: value,
                type: type
            },
            success: function (data) {
                console.log("option sukses")
                console.log(data)
            },
            error: function (data) {
                console.log(data)
                console.log("option gagal")
            }

        })
    }

    function replaceLabel(label) {
      return label.replace(/\s/g, '_')
    }
    function optionElement(columnId,elementType, taskId, columnId) {

        if (elementType== TYPE_RADIO){
            $(".radio-option").each(function () {
                let optionRadio = $(this).val()
                console.log(optionRadio)
                ajaxOptionElement(optionRadio, elementType, taskId, columnId)
            })
        }
        if (elementType == TYPE_SELECT){
            $(".select-option").each(function () {
                let optionSelect = $(this).val()
                ajaxOptionElement(optionSelect, elementType, taskId, columnId)
            })

        }
        if (elementType == TYPE_CHECKBOX){
            $(".checkbox-option").each(function () {
                let optionCheckbox = $(this).val()
                ajaxOptionElement(optionRadio, elementType, taskId, columnId)

            })

        }
    }

</script>
@endpush
