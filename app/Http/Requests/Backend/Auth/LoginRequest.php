<?php

namespace App\Http\Requests\Backend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = [
            'email' => [
                'required',
                'email',
                'regex:/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/i',
            ],
            'password' => [
                'required',
                'min:8',
            ],
        ];

        return $rule;
    }

    public function messages()
    {
        return [
            'email.required' => __('Email Id is required'),
            'email.email' => __('Please enter a valid Email address'),
            'email.regex' => __('Invalid Email format'),

            'password.required' => __('Password is required'),
            'password.min:8'  => __('Minimum length of password should be 8 characters'),
        ];
    }
}
