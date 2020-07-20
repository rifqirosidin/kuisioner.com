<div class="field">
    <div>
        <div class="block block-bordered ">
            <div class="block-content">
                <div class="form-group pt-0">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-material floating">
                                <input type="text" name="label-question[]" class="form-control question">
                            </div>
                                <div class="form-material floating change_question pt-0" id="change_question-1">
{{--                                    <input type="text" name="label-question[]" class="form-control question">--}}
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
{{--                                <option value="file">File</option>--}}
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
    <script src="{{ asset('js/custom_form.js') }}"></script>
{{--    create element--}}

@endpush
