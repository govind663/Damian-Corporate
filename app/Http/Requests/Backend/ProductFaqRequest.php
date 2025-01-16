<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductFaqRequest extends FormRequest
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
                'title' => 'required|max:255|string',
                'description' => 'required|min:5|string',
            ];
        }else{
            $rule = [
                'title' => 'required|max:255|string',
                'description' => 'required|min:5|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.max' => 'Title must be less than 255 characters',
            'title.string' => 'Title must be a string',

            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 5 characters',
            'description.string' => 'Description must be a string',
        ];
    }
}
