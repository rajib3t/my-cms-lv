<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminUserRequest extends FormRequest
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
            'firstname'=>'required|regex:/^[\pL\s\-]+$/u',
            'lastname'=>'required|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|email|unique:users,email,'.$this->id,
            'mobile'=>'required|regex:/^[0-9]{10}$/|unique:users,mobile,'.$this->id,
            'roles'=>'required'
        ];
    }
}
