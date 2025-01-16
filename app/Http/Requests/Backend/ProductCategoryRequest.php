<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
                'name' => 'required|max:255|string',
            ];
        }else{
            $rule = [
                'name' => 'required|max:255|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Category Name is required',
            'name.max' => 'Category Name must be less than 255 characters',
            'name.string' => 'Category Name must be a string',
        ];
    }
}
