<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'middle_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'sometimes|email',
            'contact_number' => 'sometimes|string',
            'region_code' => 'required|string',
            'province_code' => 'required|string',
            'city_code' => 'required|string',
            'voterid' => 'sometimes|string',
            'barangay' => 'sometimes|string',
            'birthday' => 'sometimes|date',
            'is_registered_voter' => 'sometimes',
            'skillsets' => 'sometimes',
            'other_skillsets' => 'sometimes',
            'position_other' => 'sometimes',
            'business_type' => 'sometimes',
            'business_location' => 'sometimes',
            'capitalization' => 'sometimes',
            'gender' => 'sometimes',
            'address'=>'sometimes'
        ];
    }
}
