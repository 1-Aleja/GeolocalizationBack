<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'country_name' => 'required' ,
            'name' => 'required' ,
            'id'=>'nullable|integer'

        ];
    }
    public function messages()
    {
        return [
            'country_name.required' => __('messages.fielRequired', ['field' => "city_id"]),
            'name.unique' => __('messages.fielUnique', ['field' => "name"]),
            'id.integer' =>__('messages.numericField', ['field' => "city_id"]),
        ];
    }
}
