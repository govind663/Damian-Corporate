<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
                'blog_title' => 'required|string|max:255',
                'blog_image' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'description' => 'required|string',
                'blog_category_id' => 'required|numeric',
                'tags' => 'required|string|max:255',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'blog_title' => 'required|string|max:255',
                'blog_image' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'description' => 'required|string',
                'blog_category_id' => 'required|numeric',
                'tags' => 'required|string|max:255',
                'status' => 'required|numeric',
            ];
        }
        // dd($rule);
        return $rule;
    }

    public function messages()
    {
        return [
            'blog_title.required' => 'Blog title is required',
            'blog_title.string' => 'Blog title must be a string',
            'blog_title.max' => 'Blog title must be less than 255 characters',

            'blog_image.required' => 'Blog Post Image is required',
            'blog_image.mimes' => 'Blog Post Image must be a file of type: jpeg, png, jpg, pdf',
            'blog_image.max' => 'Blog Post Image must be less than 2048 kilobytes',

            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description must be less than 255 characters',

            'blog_category_id.required' => 'Blog category is required',
            'blog_category_id.numeric' => 'Blog category must be a number',

            'tags.required' => 'Tags is required',
            'tags.string' => 'Tags must be a string',
            'tags.max' => 'Tags must be less than 255 characters',
        ];
    }
}
