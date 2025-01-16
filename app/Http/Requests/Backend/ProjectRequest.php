<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
                'project_image' => 'mimes:jpeg,png,jpg|max:2048',
                'project_name' => 'required|max:255|string',
                'slug' => 'required|max:255|string',
                'category_id' => 'required|max:255|numeric',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'project_image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'project_name' => 'required|max:255|string',
                'slug' => 'required|max:255|string|unique:projects,slug',
                'category_id' => 'required|max:255|numeric',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'project_image.required' => 'Please upload a project image',
            'project_image.mimes' => __('Project image must be a file of type: jpeg, png, jpg'),
            'project_image.max' => __('The size of project image should not exceed 2 MB.'),

            'project_name.required' => __('Project Name is required'),
            'project_name.max' => __('The size of project name should not exceed 255 characters.'),
            'project_name.string' => __('Project name must be a string.'),

            'slug.required' => __('Slug is required'),
            'slug.max' => __('The size of slug should not exceed 255 characters.'),
            'slug.string' => __('Slug must be a string.'),
            'slug.unique' => __('Slug must be unique.'),

            'category_id.required' => __('Category is required'),
            'category_id.numeric' => __('Category must be a number.'),
            'category_id.max' => __('The size of category should not exceed 255 characters.'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number.'),
        ];
    }
}
