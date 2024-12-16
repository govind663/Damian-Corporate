<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CompanyInformationRequest extends FormRequest
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
                'company_logo' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                'company_description' => 'required|min:5|string',
                'company_address' => 'required|string',
                'location_name' => 'required|string',
                'location_link' => 'required|string',
                'company_phone' => 'required|max:255|string',
                'company_email' => 'required|max:255|string',
            ];
        }else{
            $rule = [
                'company_logo' => 'required|mimes:jpeg,png,jpg|max:2048',
                'company_description' => 'required|min:5|string',
                'company_address' => 'required|string',
                'location_name' => 'required|string',
                'location_link' => 'required|string',
                'company_phone' => 'required|max:255|numeric',
                'company_email' => 'required|max:255|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'company_logo.required' => 'Company Logo is required',
            'company_logo.mimes' => 'Company Logo must be a file of type: jpeg, png, jpg',
            'company_logo.max' => 'Company Logo may not be greater than 2048 kilobytes.',

            'company_description.required' => 'Company Description is required',
            'company_description.min' => 'Company Description must be at least 5 characters.',
            'company_description.string' => 'Company Description must be a string.',

            'company_address.required' => 'Company Address is required',
            'company_address.string' => 'Company Address must be a string.',

            'location_name.required' => 'Location Name is required',
            'location_name.string' => 'Location Name must be a string.',

            'location_link.required' => 'Location Link is required',
            'location_link.string' => 'Location Link must be a string.',

            'company_phone.required' => 'Company Phone Number is required',
            'company_phone.max' => 'Company Phone Number may not be greater than 255 characters.',
            'company_phone.numeric' => 'Company Phone Number must be a number.',

            'company_email.required' => 'Company Email is required',
            'company_email.max' => 'Company Email may not be greater than 255 characters.',
            'company_email.string' => 'Company Email must be a string.',
        ];
    }
}
