<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActivityRequest extends FormRequest
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
            'owner' => 'required',
            'target_id' => 'required',
            'title' => 'required',
            'success_indicator' => 'required',
            'location' => '',
            // 'remarks' => '',
            'plan_b' => '',
            'support_request' => '',
            'support_from_whom' => '',
            'support_how_much' => '',
            'support_when_needed' => '',
            'target_start' => 'required',
            'target_end' => 'required',
        ];
    }
}
