<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title'=>'required',
            'body'=>'required',
            'sub_title' => 'required',
            'image' => "mimes:jpeg,jpg,png,gif|required|max:10000",
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Title is required',
            'body.required' => 'BodyContent is required',
            'image.required' => 'Image is required',
            'sub_title.required' => 'SubTitle is required',


        ];
    }
}
