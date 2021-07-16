<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'des_from'=>'required',
            'des_to'=>'required',
            'depart'=>'required',
            'returning'=>'required',
            'adult'=>'required',
            'children'=>'required',
            'f_class'=>'required'


        ];

       
    }

    public function messages()
    {
        return[
            'des_from.required' => 'Flying From is required',
            'des_to.required' => 'Flying To is required',
            'depart.required' => 'Departure Date is required',
            'returning.required' => 'Returning Date is required',
            'adult.required' => 'Number Of Adults is required',
            'f_class.required' => 'Flight Class is required',
            'children.required' => 'Number Of Children is required',

        ];
    }
}
