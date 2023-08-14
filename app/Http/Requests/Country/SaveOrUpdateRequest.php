<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            
            'name' => 'required' ,
            'id'=>'nullable|integer'

        ];
    }
    public function messages()
    {
        return [
            'name.unique' => __('messages.fielUnique', ['field' => "name"]),
            'id.integer' =>__('messages.numericField', ['field' => "city_id"]),
        ];
    }
}
