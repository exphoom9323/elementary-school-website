<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
          'studentcode' =>'required| regex:/^[0-9]{4}?$/ |unique:users',
          'idcard'  =>'required| regex:/^[0-9]{13}?$/ ',
          'studentyear' =>'required',
        ];
    }
}
