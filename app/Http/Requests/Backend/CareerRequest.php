<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
                'careers_image' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'description' => 'required|string',
            ];
        }else{
            $rule = [
                'careers_image' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'description' => 'required|string',
            ];
        }
        // dd($rule);
        return $rule;
    }

    public function messages()
    {
        return [
            'careers_image.required' => 'Please upload an careers image',
            'careers_image.mimes' => 'Please upload a valid image file',
            'careers_image.max' => 'The image size should not exceed 2MB',

            'description.required' => 'Description is required',
            'description.string' => 'Description should be a string',
        ];
    }
}
