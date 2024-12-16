<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => __('Name is required'),
            'name.string' => __('Name must be a string'),
            'name.max' => __('Name should not exceed 255 characters.'),

            'designation.required' => __('Designation is required'),
            'designation.string' => __('Designation must be a string'),
            'designation.max' => __('Designation should not exceed 255 characters.'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be a string'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number.'),
        ];
    }
}
