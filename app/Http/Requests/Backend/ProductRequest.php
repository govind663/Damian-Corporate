<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'product_category_id' => 'required|numeric',
                'product_sub_category_id' => 'required|numeric',
                // 'product_colors_id' => 'required|numeric',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'required|string',
                'project_image' => 'mimes:jpeg,png,jpg|max:2048',
                'product_other_images.*' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
                'price' => 'required|numeric',
                'discount_type' => 'required|numeric',
                // 'length' => 'required|string|max:255',
                // 'height' => 'required|string|max:255',
                // 'width' => 'required|string|max:255',
                // 'depth' => 'required|string|max:255',
                // 'seat_height' => 'required|string|max:255',
                'product_type' => 'required|numeric',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'product_category_id' => 'required|numeric',
                'product_sub_category_id' => 'required|numeric',
                // 'product_colors_id' => 'required|numeric',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'required|string',
                'project_image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'product_other_images.*' => 'required|mimes:jpeg,png,jpg,webp|max:2048',
                'price' => 'required|numeric',
                'discount_type' => 'required|numeric',
                // 'length' => 'required|string|max:255',
                // 'height' => 'required|string|max:255',
                // 'width' => 'required|string|max:255',
                // 'depth' => 'required|string|max:255',
                // 'seat_height' => 'required|string|max:255',
                'product_type' => 'required|numeric',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'product_category_id.required' => __('Product Category is required'),
            'product_category_id.numeric' => __('Product Category must be a number'),

            'product_sub_category_id.required' => __('Product Sub Category is required'),
            'product_sub_category_id.numeric' => __('Product Sub Category must be a number'),

            'product_colors_id.required' => __('Product Colors is required'),
            'product_colors_id.numeric' => __('Product Colors must be a number'),

            'name.required' => __('Product Name is required'),
            'name.string' => __('Product Name must be a string'),
            'name.max' => __('Product Name must be less than 255 characters'),

            'slug.required' => __('Product Slug is required'),
            'slug.string' => __('Product Slug must be a string'),
            'slug.max' => __('Product Slug must be less than 255 characters'),

            'description.required' => __('Product Description is required'),
            'description.string' => __('Product Description must be a string'),

            'project_image.required' => __('Product Image is required'),
            'project_image.mimes' => __('Product Image must be a jpeg, png, jpg'),
            'project_image.max' => __('Product Image size must be less than or equal to 2MB'),

            'product_other_images.*.required' => __('Product Other Images is required'),
            'product_other_images.*.mimes' => __('Product Other Images must be a jpeg, png, jpg, webp'),
            'product_other_images.*.max' => __('Product Other Images size must be less than or equal to 2MB'),

            'price.required' => __('Price is required'),
            'price.numeric' => __('Price must be a number'),

            'discount_type.required' => __('Discount Type is required'),
            'discount_type.numeric' => __('Discount Type must be a number'),

            'length.required' => __('Length is required'),
            'length.string' => __('Length must be a string'),
            'length.max' => __('Length must be less than 255 characters'),

            'height.required' => __('Height is required'),
            'height.string' => __('Height must be a string'),
            'height.max' => __('Height must be less than 255 characters'),

            'width.required' => __('Width is required'),
            'width.string' => __('Width must be a string'),
            'width.max' => __('Width must be less than 255 characters'),

            'depth.required' => __('Depth is required'),
            'depth.string' => __('Depth must be a string'),
            'depth.max' => __('Depth must be less than 255 characters'),

            'seat_height.required' => __('Seat Height is required'),
            'seat_height.string' => __('Seat Height must be a string'),
            'seat_height.max' => __('Seat Height must be less than 255 characters'),

            'product_type.required' => __('Product Type is required'),
            'product_type.numeric' => __('Product Type must be a number'),

            'status.required' => __('Product Status is required'),
            'status.numeric' => __('Product Status must be a number'),
        ];
    }
}
