<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnetRequest extends FormRequest
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
          'thai'=> ['required', 'regex:/^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$/' ,'max:6'],
          'eng'=> ['required', 'regex:/^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$/' ,'max:6'],
          'mathematics'=> ['required', 'regex:/^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$/' ,'max:6'],
          'science'=> ['required', 'regex:/^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$/' ,'max:6'],
          'allthai'=> ['required', 'regex:/^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$/' ,'max:6'],
          'alleng'=> ['required', 'regex:/^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$/' ,'max:6'],
          'allmathematics'=> ['required', 'regex:/^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$/' ,'max:6'],
          'allscience'=> ['required', 'regex:/^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$/' ,'max:6'],
        ];
    }
}
