<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormValidation extends FormRequest
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
      'category-name' => 'required|regex:/^[a-zA-Z0-9\s\áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇ]+$/',
      //'objective' => 'required|numeric|min:1',
    ];
  }
}
