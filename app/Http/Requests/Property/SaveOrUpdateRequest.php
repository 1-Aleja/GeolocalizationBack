<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_owner' => 'required' ,
            'email_owner' => 'required' ,
            'residential_set' => 'required' ,
            'tower' => 'required' ,
            'appartment' => 'required' ,
            'address' => 'required' ,
            'sector_name' => 'required' ,
            'city_name' => 'required' ,

        ];
    }
    public function messages()
    {
        return [
            'name_owner.required' => __('messages.fielRequired', ['field' => "name_owner"]),
            'email_owner.unique' => __('messages.fielRequired', ['field' => "email_owner"]),
            'residential_set.required' => __('messages.fielRequired', ['field' => "residential_set"]),
            'tower.unique' => __('messages.fielRequired', ['field' => "tower"]),
            'appartment.required' => __('messages.fielRequired', ['field' => "appartment"]),
            'address.unique' => __('messages.fielRequired', ['field' => "address"]),
            'sector_name.required' => __('messages.fielRequired', ['field' => "sector_name"]),
            'city_name.unique' => __('messages.fielRequired', ['field' => "city_name"]),
            
        ];
    }
}
