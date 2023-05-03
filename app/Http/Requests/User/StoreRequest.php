<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;


class StoreRequest extends FormRequest
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
            'name'=>'required',
            'email'=>[
                'email','required',
                Rule::unique('users', 'email')->ignore($this->route('id'))
            ],
            'password' => [
                'nullable',
                'min:6',
                'max:191',
                Rule::requiredIf(function() {
                    return Request::routeIs('dashboard.users.store');
                })
            ],
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'status'=>'required'
        ];
    }
}
