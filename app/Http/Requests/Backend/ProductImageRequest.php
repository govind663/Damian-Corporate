<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
                'product_other_images' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
                'product_id' => 'required|numeric',
            ];
        }else{
            $rule = [
                'product_other_images' => 'required|mimes:jpeg,png,jpg,webp|max:2048',
                'product_id' => 'required|numeric',
            ];
        }
        return $rule;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'product_other_images.required' => __('Product Images is required'),
            'product_other_images.mimes' => __('Product Images must be a jpeg, png, jpg, webp'),
            'product_other_images.max' => __('Product Images size must be less than or equal to 2MB'),

            'product_id.required' => __('Product Name is required'),
            'product_id.numeric' => __('Product Name must be a number'),
        ];
    }
}
