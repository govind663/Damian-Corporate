<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SendContactEmailRequest extends FormRequest
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
        if ($this->id){
            $rule = [
                'name' => 'required|string|max:255|regex:/^[A-Za-z0-9 ]+$/',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|numeric',
                'address' => 'required|string|min:1',
                'messege' => 'required|string|min:1',
            ];
        }else{
            $rule = [
                'name' => 'required|string|max:255|regex:/^[A-Za-z0-9 ]+$/',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|numeric',
                'address' => 'required|string|min:1',
                'messege' => 'required|string|min:1',
                'g-recaptcha-response' => 'required|captcha',
            ];
        }

        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be string',
            'name.max' => 'Name must be less than 255 characters',
            'name.regex' => 'Enter valid name',

            'email.required' => 'Email is required',
            'email.string' => 'Email must be string',
            'email.email' => 'Email must be valid email',

            'phone.required' => 'Phone is required',
            'phone.string' => 'Phone must be string',
            'phone.numeric' => 'Phone must be numeric',

            'address.required' => 'Address is required',
            'address.string' => 'Address must be string',
            'address.min' => 'Address must be at least 1 characters',

            'messege.required' => 'Messege is required',
            'messege.string' => 'Messege must be string',
            'messege.max' => 'Messege must be at least 1 characters',

            'g-recaptcha-response.required' => 'Captcha is required',
            'g-recaptcha-response.captcha' => 'The reCAPTCHA verification failed. Please try again.',
        ];
    }
}
