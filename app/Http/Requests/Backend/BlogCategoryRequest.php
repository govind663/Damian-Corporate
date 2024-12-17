<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
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
                'category_name' => 'required|max:255|string',
            ];
        }else{
            $rule = [
                'category_name' => 'required|max:255|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Category Name is required',
            'category_name.max' => 'Category Name must be less than 255 characters',
            'category_name.string' => 'Category Name must be a string',
        ];
    }
}
