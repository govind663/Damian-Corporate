<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AwardMediaRequest extends FormRequest
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
                'award_image' => 'mimes:jpeg,png,jpg|max:2048',
                'description' => 'required|min:5|string',
                'year' => 'required|max:255|string',
                'status' => 'required|max:3|numeric',
            ];
        }else{
            $rule = [
                'award_image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required|min:5|string',
                'year' => 'required|max:255|string',
                'status' => 'required|max:3|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'award_image.required' => __('Please upload an Award & Media Image is required'),
            'award_image.mimes' => __('Award & Media Image must be a file of type: jpeg, png, jpg'),
            'award_image.max' => __('The size of Award & Media Image should not exceed 2 MB.'),

            'description.required' => __('Description is required'),
            'description.min' => __('Description must be at least 5 characters.'),
            'description.string' => __('Description must be a string.'),

            'year.required' => __('Year is required'),
            'year.max' => __('Year must be at most 255 characters.'),
            'year.string' => __('Year must be a string.'),

            'status.required' => __('Status is required'),
            'status.max' => __('Status must be at most 3 characters.'),
            'status.numeric' => __('Status must be a number.'),
        ];
    }
}
