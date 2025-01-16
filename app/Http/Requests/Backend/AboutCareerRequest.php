<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AboutCareerRequest extends FormRequest
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
                'image' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'title' => 'required|string|max:255',
                'short_description.*' => 'required|string',
                'description' => 'required|string',
            ];
        }else{
            $rule = [
                'image' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'title' => 'required|string|max:255',
                'short_description.*' => 'required|string',
                'description' => 'required|string',
            ];
        }
        // dd($rule);
        return $rule;
    }

    public function messages()
    {
        return [
            'image.required' => 'Please upload an image',
            'image.mimes' => 'Please upload a valid image file',
            'image.max' => 'The image size should not exceed 2MB',

            'title.required' => 'Title is required',
            'title.string' => 'Title should be a string',
            'title.max' => 'Title must be less than 255 characters',

            'short_description.*.required' => 'Short Description is required',
            'short_description.*.string' => 'Short Description should be a string',

            'description.required' => 'Description is required',
            'description.string' => 'Description should be a string',
        ];
    }

}
