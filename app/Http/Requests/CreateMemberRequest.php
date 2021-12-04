<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequest extends FormRequest
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
            'affiliation_id' => 'required',
            'last_name' => 'required|string',
            'middle_name' => '',
            'first_name' => 'required|string',
            'birthday' => 'sometimes|date',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'string',
            'region_code' => 'sometimes',
            'province_code' => 'sometimes',
            'city_code' => 'sometimes',
            'voterid' => 'sometimes',
            'barangay' => 'sometimes',
            'position_other' => 'sometimes',
            'skillsets' => 'sometimes',
            'other_skillsets' => 'sometimes',
            'is_registered_voter' => 'sometimes',
            'business_type' => 'sometimes',
            'business_location' => 'sometimes',
            'capitalization' => 'sometimes',
            'gender' => 'sometimes',
            'address'=>'sometimes',
            'country_id' => '', 
            'state_id' => '', 
            'world_city_id' => '',
            'outreach' => '',
            'needs' => ''
        ];
    }
}
