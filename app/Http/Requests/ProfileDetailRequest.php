<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileDetailRequest extends FormRequest
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
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'sometimes|email',
            'contact_number' => 'sometimes|string',
            'region_code' => 'required|string',
            'province_code' => 'required|string',
            'city_code' => 'required|string',
            'voterid' => 'sometimes',
            'barangay' => 'sometimes',
            'birthday' => 'sometimes|date',
            'is_registered_voter' => 'sometimes',
            'skillsets' => 'sometimes',
            'other_skillsets' => 'sometimes',
            'business_type' => 'sometimes',
            'business_location' => 'sometimes',
            'capitalization' => 'sometimes',
            'gender' => 'sometimes',
            'address'=>'sometimes',
            'country_id'=>'',
            'state_id'=>'',
            'world_city_id'=>'',
        ];
    }
}
