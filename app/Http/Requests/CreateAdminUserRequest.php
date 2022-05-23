<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminUserRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'mobile'=>'required|regex:/^[0-9]{10}$/|unique:users,mobile',
            'roles'=>'required',
            'password'=>'required|min:8|same:password_confirmation',
            'password_confirmation'=>'required'
        ];
    }
}
