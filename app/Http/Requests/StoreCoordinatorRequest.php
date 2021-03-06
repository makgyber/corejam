<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoordinatorRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'as_admin' => ['string'],
            'coordinator_level' => 'sometimes',
            'region_code' => 'sometimes',
            'province_code' => 'sometimes',
            'city_code' => 'sometimes',
            'country_id' => '',
            'state_id' => '',
            'world_city_id' => ''
        ];
    }
}
