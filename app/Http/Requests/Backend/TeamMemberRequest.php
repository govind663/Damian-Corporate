<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberRequest extends FormRequest
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
                'member_profile_image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                'team_id' => 'required|numeric',
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'member_profile_image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'team_id' => 'required|numeric',
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'member_profile_image.required' => __('Member Profile Image is required'),
            'member_profile_image.mimes' => __('Member Profile Image must be a file of type: jpeg, png, jpg'),
            'member_profile_image.max' => __('Member Profile Image may not be greater than 2MB'),

            'team_id.required' => __('Team is required'),
            'team_id.numeric' => __('Team must be a number'),

            'name.required' => __('Name is required'),
            'name.max' => __('Name must be at most 255 characters'),
            'name.string' => __('Name must be a string'),

            'designation.required' => __('Designation is required'),
            'designation.max' => __('Designation must be at most 255 characters'),
            'designation.string' => __('Designation must be a string'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number'),
        ];
    }
}
