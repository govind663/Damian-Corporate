<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class VisionRequest extends FormRequest
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
                'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                'title' => 'required|max:255|string',
                'description' => 'required|min:5|string',
                'sub_title.*' => 'required|max:255|string',
                'sub_description.*' => 'required|min:5|string',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'title' => 'required|max:255|string',
                'description' => 'required|min:5|string',
                'sub_title.*' => 'required|max:255|string',
                'sub_description.*' => 'required|min:5|string',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'image.required' => __('Image is required'),
            'image.mimes' => __('Image must be a file of type: jpeg, png, jpg'),
            'image.max' => __('Image size must be less than or equal to 2MB'),

            'title.required' => __('Title is required'),
            'title.max' => __('Title must be at most 255 characters'),
            'title.string' => __('Title must be a string'),

            'description.required' => __('Description is required'),
            'description.min' => __('Description must be at least 5 characters'),
            'description.string' => __('Description must be a string'),

            'sub_title.*.required' => __('Sub Title is required'),
            'sub_title.*.max' => __('Sub Title must be at most 255 characters'),
            'sub_title.*.string' => __('Sub Title must be a string'),

            'sub_description.*.required' => __('Sub Description is required'),
            'sub_description.*.min' => __('Sub Description must be at least 5 characters'),
            'sub_description.*.string' => __('Sub Description must be a string'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number'),
        ];

    }
}
