<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectYearRequest extends FormRequest
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
          'p1' => 'required| regex:/^[0-4]+(\.[0-9][0-9]?)?$/ |max:4',
          'p2' => 'required| regex:/^[0-4]+(\.[0-9][0-9]?)?$/ |max:4',
          'p3' => 'required| regex:/^[0-4]+(\.[0-9][0-9]?)?$/ |max:4',
          'p4' => 'required| regex:/^[0-4]+(\.[0-9][0-9]?)?$/ |max:4',
          'p5' => 'required| regex:/^[0-4]+(\.[0-9][0-9]?)?$/ |max:4',
          'p6' => 'required| regex:/^[0-4]+(\.[0-9][0-9]?)?$/ |max:4',
        ];
    }
}
