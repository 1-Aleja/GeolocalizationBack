<?php

namespace App\Http\Requests\Sector;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'city_name' => 'required' ,
            'name' => 'required' ,

        ];
    }
    public function messages()
    {
        return [
            'city_name.required' => __('messages.fielRequired', ['field' => "city_id"]),
            'name.unique' => __('messages.fielUnique', ['field' => "name"]),
        ];
    }
}
