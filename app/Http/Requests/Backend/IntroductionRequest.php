<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class IntroductionRequest extends FormRequest
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
                'title' => 'required|min:3|string',
                'introduction_image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required|min:5|string',
                'status' => 'required|string',
            ];
        }else{
            $rule = [
                'title' => 'required|min:3|string',
                'introduction_image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required|min:5|string',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'title.required' => __('Title is required'),
            'title.min' => __('Title must be at least 3 characters'),
            'title.string' => __('Title must be a string'),

            'introduction_image.required' => __('Image is required'),
            'introduction_image.mimes' => __('Image must be a file of type: jpeg, png, jpg'),
            'introduction_image.max' => __('Image may not be greater than 2MB'),

            'description.required' => __('Description is required'),
            'description.min' => __('Description must be at least 5 characters'),
            'description.string' => __('Description must be a string'),

            'status.required' => __('Status is required'),
            'status.string' => __('Status must be a string'),
        ];
    }
}
