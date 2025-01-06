<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class OurServiceRequest extends FormRequest
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
                'service_image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                'service_logo' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                'service_title' => 'required|max:255|string',
                'service_description' => 'required|min:5|string',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'service_image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'service_logo' => 'required|mimes:jpeg,png,jpg|max:2048',
                'service_title' => 'required|max:255|string',
                'service_description' => 'required|min:5|string',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'service_image.required' => __('Service Image is required'),
            'service_image.mimes' => __('Service Image must be a file of type: jpeg, png, jpg'),
            'service_image.max' => __('Service Image size must be less than or equal to 2MB'),

            'service_logo.required' => __('Service Logo is required'),
            'service_logo.mimes' => __('Service Logo must be a file of type: jpeg, png, jpg'),
            'service_logo.max' => __('Service Logo size must be less than or equal to 2MB'),

            'service_title.required' => __('Service Title is required'),
            'service_title.max' => __('Service Title must be at most 255 characters'),
            'service_title.string' => __('Service Title must be a string'),

            'service_description.required' => __('Service Description is required'),
            'service_description.min' => __('Service Description must be at least 5 characters'),
            'service_description.string' => __('Service Description must be a string'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number'),
        ];
    }

}
