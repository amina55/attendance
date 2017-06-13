<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherCreateRequest extends FormRequest
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
            'qualification' => 'bail|required|min:2|max:100',
           // 'unique_name' => 'bail|required|min:3|max:50|unique:teachers',
           // 'cnic' => 'bail|required|min:7|max:50|unique:teachers',
        ];

        if($this->attributes->has('unique_name')) {
            $rules['unique_name'] = 'bail|required|min:3|max:50|unique:teachers';
            $rules['cnic'] = 'bail|required|min:7|max:50|unique:teachers';
        }

        return $rules;
    }
}
