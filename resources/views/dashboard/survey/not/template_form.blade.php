<div class="field">
    <div id="field-1">
        <div class="block block-bordered ">
            <div class="block-content">
                <div class="form-group pt-0">
                    <div class="row">
                        <div class="col-9">
                            <div>
                                <div class="form-material floating change_question" id="questionId-1">
                                    <input type="text" name="label-1" class="form-control question">
                                    <input type="text" class="form-control type-field-question" data-key="1" name="question-1" placeholder="Short Text" value="" disabled>

                                </div>
                            </div>

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
    <div id="field-2">
        <div class="block block-bordered ">
            <div class="block-content">
                <div class="form-group pt-0">
                    <div class="row">
                        <div class="col-9">
                            <div>
                                <div class="form-material floating change_question" id="questionId-1">
                                    <input type="text" name="label-1" class="form-control question">
                                    <input type="text" class="form-control type-field-question" data-key="1" name="question-1" placeholder="Short Text" value="" disabled>

                                </div>
                            </div>

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
    <div id="field-3">
        <div class="block block-bordered ">
            <div class="block-content">
                <div class="form-group pt-0">
                    <div class="row">
                        <div class="col-9">
                            <div>
                                <div class="form-material floating change_question" id="questionId-1">
                                    <input type="text" name="label-1" class="form-control question">
                                    <input type="text" class="form-control type-field-question" data-key="1" name="question-1" placeholder="Short Text" value="" disabled>

                                </div>
                            </div>

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
{{--       <select class="form-control type_form" name="type_form" id="type_form-1">--}}
{{--           <option value="shorttext">Short Text</option>--}}
{{--           <option value="longtext">Long Text</option>--}}
{{--           <option value="select">Select</option>--}}
{{--           <option value="radio">Radio</option>--}}
{{--           <option value="checkbox">Checkbox</option>--}}
{{--       </select>--}}
   </div>
</div>

@push('js')
{{--    create element--}}
<script>
    //inisialisasi type form



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

      let test =  $(this).parent('div').parent('div').parent('div').attr("id");
       console.log(test)
        $(this).parent('div').parent('div').parent('div').remove()
    })

    //change type form

    $(".change_question").on('click', '.remove-option', function (e) {
        console.log('klik remove')
        $(this).parent('div').remove()
    })


</script>


@endpush
