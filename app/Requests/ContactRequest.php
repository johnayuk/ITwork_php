<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'realname'=>'required',
            'subject'=>'required',
            'message' => 'required',
            'email' => "required",
        ];
    }


    public function messages()
    {
        return[
            'realname.required' => 'Name is required',
            'email.required' => 'Email is required',
            'message.required' => 'Message is required',
            'subject.required' => 'Subject is required',
        ];
    }
}
