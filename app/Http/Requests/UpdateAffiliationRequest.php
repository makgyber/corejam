<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAffiliationRequest extends FormRequest
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
            'description' => 'required',
            'address' => 'required',
            'region_code' => 'required',
            'province_code' => 'required',
            'city_code' => 'required',
            'position' => 'required',
            'position_other' => '',
            'is_primary' => '',
        ];
    }
}
