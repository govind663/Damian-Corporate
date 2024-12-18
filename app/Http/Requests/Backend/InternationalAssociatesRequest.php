<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class InternationalAssociatesRequest extends FormRequest
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
                'international_associate_image' => 'mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'international_associate_image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'international_associate_image.required' => __('International associate image is required'),
            'international_associate_image.mimes' => __('International associate image must be a file of type: jpeg, png, jpg'),
            'international_associate_image.max' => __('The size of international associate image should not exceed 2 MB.'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number.'),
        ];
    }
}
