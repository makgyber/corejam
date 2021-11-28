<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAffiliationRequest extends FormRequest
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
            'organisation_type' => 'required',
            'name' => 'required',
            'description' => 'sometimes',
            'address' => 'sometimes',
            'region_code' => 'sometimes',
            'province_code' => 'sometimes',
            'city_code' => 'sometimes',
            'position' => 'sometimes',
            'position_other' => '',
            'is_primary' => '',
            'country_id' => '', 
            'state_id' => '', 
            'world_city_id' => ''
        ];
    }
}
