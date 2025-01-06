<?php

namespace App\Http\Requests\Frontend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'f_name' => [
               'required',
               'string',
               'max:255',
            ],
            'l_name' => [
               'required',
               'string',
               'max:255',
            ],
            'email' => [
                'required',
                'email',
                'regex:/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/i',
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
            'password_confirmation' => [
               'required',
               'same:password',
            ],
        ];

        return $rule;
    }

    public function messages()
    {
        return [
            'f_name.required' => __('First Name is required'),
            'f_name.string' => __('First Name should be a string'),
            'f_name.max:255' => __('First Name should not exceed 255 characters'),

            'l_name.required' => __('Last Name is required'),
            'l_name.string' => __('Last Name should be a string'),
            'l_name.max:255' => __('Last Name should not exceed 255 characters'),

            'phone.required' => __('Mobile Number is required'),
            'phone.string' => __('Mobile Number should be a string'),
            'phone.max:255' => __('Mobile Number should not exceed 255 characters'),

            'email.required' => __('E-Mail Address is required'),
            'email.email' => __('Please enter a valid E-Mail Address'),
            'email.regex' => __('Invalid Email format'),

            'password.required' => __('Password is required'),
            'password.confirmed' => __('Password and Confirm Password do not match'),
            'password.min:8'  => __('Minimum length of password should be 8 characters'),

            'password_confirmation.required' => __('Confirm Password is required'),
            'password_confirmation.same' => __('Password and Confirm Password do not match'),
        ];
    }
}
