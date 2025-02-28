<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class sendSubscribeUsMailRequest extends FormRequest
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
                'email_id' => 'required|string|email|max:255',
            ];
        }else{
            $rule = [
                'email_id' => 'required|string|email|max:255',
            ];
        }

        return $rule;
    }

    public function messages()
    {
        return [
            'email_id.required' => 'Email is required',
            'email_id.string' => 'Email must be string',
            'email_id.email' => 'Email must be valid email',
        ];
    }
}
