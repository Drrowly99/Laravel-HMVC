<?php

namespace Modules\Signup\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'business_name' => 'required|string',
            'business_email' => ['required', 'string', 'unique:signups,business_email'],
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required'],
            'phone_no' => ['required', 'string'],
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
