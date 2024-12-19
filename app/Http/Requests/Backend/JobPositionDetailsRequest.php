<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class JobPositionDetailsRequest extends FormRequest
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
                'job_position_id' => 'required|max:3|numeric',
                'requirements.*' => 'nullable|min:3',
                'qualification.*' => 'nullable|min:3',
                'responsibilities.*' => 'nullable|min:3',
                'salary.*' => 'nullable|min:3',
                'experience' => 'nullable|max:255|string',
                'job_type' => 'nullable|numeric',
                'job_location' => 'nullable|max:255',
                'job_description' => 'nullable|min:3',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'job_position_id' => 'required|max:3|numeric',
                'requirements.*' => 'nullable|min:3',
                'qualification.*' => 'nullable|min:3',
                'responsibilities.*' => 'nullable|min:3',
                'salary.*' => 'nullable|min:3',
                'experience' => 'nullable|max:255|string',
                'job_type' => 'nullable|numeric',
                'job_location' => 'nullable|max:255',
                'job_description' => 'nullable|min:3',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'job_position_id.required' => 'Job Position is required',
            'job_position_id.numeric' => 'Job Position must be a number',
            'job_position_id.max' => 'Job Position must be 3 digit',

            // 'requirements.*.required' => 'Requirements is required',
            'requirements.*.max' => 'Requirements must be 3 character',

            // 'qualification.*.required' => 'Qualification is required',
            'qualification.*.max' => 'Qualification must be 3 character',

            // 'responsibilities.*.required' => 'Responsibilities is required',
            'responsibilities.*.max' => 'Responsibilities must be 3 character',

            'experience.required' => 'Experience is required',
            'experience.max' => 'Experience must be 255 character',
            'experience.string' => 'Experience must be a string',

            'job_type.required' => 'Job Type is required',
            'job_type.numeric' => 'Job Type must be a number',

            'job_location.required' => 'Job Location is required',
            'job_location.max' => 'Job Location must be 255 character',

            // 'job_description.required' => 'Job Description is required',
            'job_description.min' => 'Job Description must be 3 character',

            'salary.*.max' => 'Salary must be 3 character',

            'status.required' => 'Status is required',
            'status.numeric' => 'Status must be a number',
        ];
    }
}
