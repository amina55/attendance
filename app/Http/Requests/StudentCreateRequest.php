<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'name' => 'bail|required|min:3|max:100',
            'phone_no' => 'required|regex:/[0-9]{9}/',
            'email' => 'bail:required|string|email|max:100',
            'address' => 'bail|required|min:3|max:200',
            'semester' => 'bail|required|numeric|between:1,8',
            'section' => 'bail|required|min:1|max:1',
        ];

        if($this->attributes->has('enroll_no')) {
            $rules['enroll_no'] = 'bail|required|min:2|max:50|unique:';
        }

        return $rules;
    }
}
