<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDistrictRequest extends FormRequest
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
            'name'=>'required|unique:distrits,name',
            'code'=>'required|unique:districts,code',
            'address_line_1'=>'required',
            'city'=>'required',
            'district'=>'required',
            'postal_code'=>'required',
        ];
    }
}
