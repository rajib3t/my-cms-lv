<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSamithiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required',
                Rule::unique('samithis')->where(function ($query) {
                return $query->where('district_id', $this->samithi_district)->where('id', '!=', $this->id);
            })],
            'samithi_district' => 'required',
            'address_line_1' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'district' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [

            'name.unique' => 'Samithi name already exists in this district',

        ];
    }
}
