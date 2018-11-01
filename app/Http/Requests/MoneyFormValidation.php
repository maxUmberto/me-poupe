<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoneyFormValidation extends FormRequest
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

    /*public function messages()
    {
        return [
            'value.required' => 'A value is required',
            'value.integer'  => 'An integer value is required',
        ];
    }*/

    public function rules()
    {
        return [
            'value' => 'required|numeric|min:1',
        ];
    }
}
