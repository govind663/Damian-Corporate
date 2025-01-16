<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class JobPositionRequest extends FormRequest
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
                'job_title' => 'required|string|max:255',
            ];
        }else{
            $rule = [
                'job_title' => 'required|string|max:255',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'job_title.required' => 'Job Position Name is required',
            'job_title.max' => 'Job Position Name must be less than 255 characters',
            'job_title.string' => 'Job Position Name must be a string',
        ];
    }
}
