<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'gender' => 'required|string',
            'description' => 'required',
            'city' => 'nullable',

        ];
        if ($this->isMethod('POST')){
            $rules['number_of_respondents'] = 'required|numeric';
            $rules['respondent_fee'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
        }

        return $rules;
    }
}
