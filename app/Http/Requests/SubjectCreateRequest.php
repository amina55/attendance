<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectCreateRequest extends FormRequest
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
            'credit_hour' => 'bail|required|min:3|max:5',
            'semester' => 'bail|required|numeric|between:1,8',
            'teacher_section_A' => 'bail|required|min:1|max:1',
            'teacher_section_B' => 'bail|required|min:1|max:1',
            'period_section_A' => 'required',
            'period_section_B' => 'required',
        ];

        if($this->request->has('short_key')) {
            $rules['short_key'] = 'bail|required|min:2|max:50|unique:subjects';
        }
        return $rules;
    }
}
