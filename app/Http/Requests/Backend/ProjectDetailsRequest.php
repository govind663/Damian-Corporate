<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProjectDetailsRequest extends FormRequest
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
                'banner_image.*' => 'mimes:jpeg,png,jpg|max:2048',
                'project_id' => 'required|max:255|numeric',
                'slug' => 'required|max:255|string',
                'location' => 'required|max:255|string',
                'location_url' => 'nullable',
                'total_constructed_area' => 'required|max:255|string',
                'project_description' => 'required|min:5|string',
            ];
        }else{
            $rule = [
                'banner_image.*' => 'required|mimes:jpeg,png,jpg|max:2048',
                'project_id' => 'required|max:255|numeric',
                'slug' => 'required|max:255|string',
                'location' => 'required|max:255|string',
                'location_url' => 'nullable',
                'total_constructed_area' => 'required|max:255|string',
                'project_description' => 'required|min:5|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [

            'banner_image.*.required' => __('Banner image is required'),
            'banner_image.*.mimes' => __('Banner image must be a file of type: jpeg, png, jpg'),
            'banner_image.*.max' => __('The size of banner image should not exceed 2 MB.'),

            'project_id.required' => __('Please select a project name is required'),
            'project_id.max' => __('The size of project name should not exceed 255 characters.'),
            'project_id.numeric' => __('Please select a project name is required'),

            'slug.required' => __('slug is required'),
            'slug.max' => __('The size of slug should not exceed 255 characters.'),
            'slug.string' => __('Slug must be a string.'),

            'location.required' => __('Location is required'),
            'location.max' => __('The size of location should not exceed 255 characters.'),
            'location.string' => __('Location must be a string.'),

            // 'location_url.required' => __('Location URL is required'),
            'location_url.max' => __('The size of location URL should not exceed 255 characters.'),
            'location_url.string' => __('Location URL must be a string.'),

            'total_constructed_area.required' => __('Total constructed area is required'),
            'total_constructed_area.max' => __('The size of total constructed area should not exceed 255 characters.'),
            'total_constructed_area.string' => __('Total constructed area must be a string.'),

            'project_description.required' => __('Project description is required'),
            'project_description.min' => __('The project description must be at least 5 characters.'),
            'project_description.string' => __('Project description must be a string.'),
        ];
    }
}
