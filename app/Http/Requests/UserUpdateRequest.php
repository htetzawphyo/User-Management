<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'full_name' => 'required|string',
            'user_name' => 'required|string',
            'user_role' => 'required',
            'user_phone' => 'required|not_regex:[-]|min:9|max:12',
            'email' => 'required|string',
            'email' => ['required', Rule::unique('users')->ignore($this->user)],
            'user_gender' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Full name is required',
            'user_name.required' => 'User name is required',
            'user_phone.required' => 'Phone number is required',
            'user_phone' => 'Phone number is invalid'
        ];
    }

    public function withValidator($validator)
    {
        $validator->validateWithBag('editUser');
    }
}
