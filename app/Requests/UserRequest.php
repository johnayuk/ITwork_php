<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            // 'password' => 'required|string|confirmed|min:6',
            'password' => 'required|string|min:6',

        ];
    }

    public function messages()
    {
        return[
            'username.required' => 'UserName is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password Time is required',
        ];
    }
}
