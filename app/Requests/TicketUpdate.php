<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'des_from'=>'required',
            'des_to'=>'required',
            'depart'=>'required',
            'return'=>'required',
            'adult'=>'required',
            'children'=>'required',
            'class'=>'required'


        ];

       
    }

    public function messages()
    {
        return[
            'des_from.required' => 'Flying From is required',
            'des_to.required' => 'Flying To is required',
            'depart.required' => 'Departure Date is required',
            'return.required' => 'Returning Date is required',
            'adult.required' => 'Number Of Adults is required',
            'class.required' => 'Flight Class is required',
            'children.required' => 'Number Of Children is required',

        ];
    }
}
