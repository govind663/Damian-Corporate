<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SendCarrerEmailRequest extends FormRequest
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
                'address' => 'required|string|max:555',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|numeric',
                'job_position_id' => 'required|numeric|max:255',
                'experience' => 'required|numeric|max:255',
                'messege' => 'required|string|max:555',
                'resume' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'portfolio' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            ];
        }else{
            $rule = [
                'name' => 'required|string|max:255|regex:/^[A-Za-z0-9 ]+$/',
                'address' => 'required|string|max:555',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|numeric',
                'job_position_id' => 'required|numeric|max:255',
                'experience' => 'required|numeric|max:255',
                'messege' => 'required|string|max:555',
                'resume' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'portfolio' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
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
            'name.max' => 'Name must be max 255',
            'name.regex' => 'Enter Valid Name',

            'address.required' => 'Address is required',
            'address.string' => 'Address must be string',
            'address.max' => 'Address must be max 555',

            'email.required' => 'Email is required',
            'email.string' => 'Email must be string',
            'email.email' => 'Email must be email',
            'email.max' => 'Email must be max 255',

            'phone.required' => 'Phone is required',
            'phone.string' => 'Phone must be string',
            'phone.numeric' => 'Phone must be numeric',

            'job_position_id.required' => 'Job Position is required',
            'job_position_id.numeric' => 'Job Position must be numeric',
            'job_position_id.max' => 'Job Position must be max 255',

            'experience.required' => 'Experience is required',
            'experience.numeric' => 'Experience must be numeric',
            'experience.max' => 'Experience must be max 255',

            'messege.required' => 'Messege is required',
            'messege.string' => 'Messege must be string',
            'messege.max' => 'Messege must be max 555',

            'resume.required' => 'Resume is required',
            'resume.mimes' => 'Resume must be jpeg,png,jpg,pdf',
            'resume.max' => 'Resume must be max 2048',

            'portfolio.required' => 'Portfolio is required',
            'portfolio.mimes' => 'Portfolio must be jpeg,png,jpg,pdf',
            'portfolio.max' => 'Portfolio must be max 2048',

            'g-recaptcha-response.required' => 'Captcha is required',
            'g-recaptcha-response.captcha' => 'The reCAPTCHA verification failed. Please try again.',
        ];
    }
}
