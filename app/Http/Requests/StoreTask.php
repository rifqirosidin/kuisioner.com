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
        return [
            'title' => 'required',
            'number_of_respondents' => 'required|numeric',
            'gender' => 'required|string',
            'description' => 'required',
            'respondent_fee' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'total_cost' => 'required',
            'link_google_form' => 'required',
            'embed_google_form' => 'required',
            'closing_sentence' => 'required|nullable',
            'city' => 'nullable',

        ];
    }
}
