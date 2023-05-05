<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class FilterEmployee extends FormRequest
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
            'gender'=>'nullable',
            'age'=>'nullable',
            'job_id'=>'nullable',
            'status'=>'nullable',
            'salary_from'=>'nullable',
            'salary_to'=>'nullable'
            //
        ];
    }
}
