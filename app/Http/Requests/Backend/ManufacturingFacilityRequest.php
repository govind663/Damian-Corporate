<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturingFacilityRequest extends FormRequest
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
                'manufacturing_facilitie_image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'manufacturing_facilitie_image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'manufacturing_facilitie_image.required' => __('Manufacturing Facility Image is required'),
            'manufacturing_facilitie_image.mimes' => __('Manufacturing Facility Image must be a file of type: jpeg, png, jpg'),
            'manufacturing_facilitie_image.max' => __('Manufacturing Facility Image may not be greater than 2MB'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number'),
        ];
    }
}
