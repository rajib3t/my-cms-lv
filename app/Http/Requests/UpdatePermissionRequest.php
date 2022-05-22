<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
        $guard_arr = config('auth.guards');
        $guards = array_keys($guard_arr);
        $guards = implode(",",$guards);
        return [
            'name'=>'required|unique:roles,name,'.$this->id,
            'guard'=>'required|string|in:'.$guards,
            'description'=>'required'
        ];
    }
}
