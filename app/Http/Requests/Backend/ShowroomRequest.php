<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ShowroomRequest extends FormRequest
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
                'office_image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                'office_name' => 'required|max:255|string',
                'office_location' => 'required|max:255|string',
                'location_link' => 'nullable|max:255|string',
                'status' => 'required|string',
            ];
        }else{
            $rule = [
                'office_image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'office_name' => 'required|max:255|string',
                'office_location' => 'required|max:255|string',
                'location_link' => 'nullable|max:255|string',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'office_image.required' => __('Office Image is required'),
            'office_image.mimes' => __('Office Image must be a file of type: jpeg, png, jpg'),
            'office_image.max' => __('Office Image may not be greater than 2MB'),

            'office_name.required' => __('Office Name is required'),
            'office_name.max' => __('Office Name must be at most 255 characters'),
            'office_name.string' => __('Office Name must be a string'),

            'office_location.required' => __('Office Location is required'),
            'office_location.max' => __('Office Location must be at most 255 characters'),
            'office_location.string' => __('Office Location must be a string'),

            // 'location_link.required' => __('Location Link is required'),
            'location_link.max' => __('Location Link must be at most 255 characters'),
            'location_link.string' => __('Location Link must be a string'),

            'status.required' => __('Status is required'),
            'status.string' => __('Status must be a string'),
        ];
    }
}
