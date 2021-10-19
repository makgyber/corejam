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
            'first_name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'string',
            'region_code' => 'required|string',
            'province_code' => 'required|string',
            'city_code' => 'required|string',
            'street' => 'string',
            'barangay' => 'string',
        ];
    }
}
