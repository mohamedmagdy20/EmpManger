<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployee extends FormRequest
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
            //
                    //
                    'name'=>'required',
                    'email'=>[
                        'email','required',
                        Rule::unique('employees', 'email')->ignore($this->route('id'))
                    ],
                    'phone'=>[
                        'required',
                        Rule::unique('employees', 'phone')->ignore($this->route('id'))
                    ],
                    'job_id'=>'required',
                    'image'=>'nullable|mimes:jpeg,jpg,png',
                    'age'=>'required|date',
                    'status'=>'',
                    'national_id'=>[
                        'required',
                         Rule::unique('employees', 'national_id')->ignore($this->route('id'))
                    ],
                    'gender'=>'required',
                    'salary'=>'required'
            
        ];
    }
}
