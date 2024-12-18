<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
                'team_name' => 'required|max:255|string',
            ];
        }else{
            $rule = [
                'team_name' => 'required|max:255|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'team_name.required' => __('Team Name is required'),
            'team_name.max' => __('Team Name must be less than 255 characters'),
            'team_name.string' => __('Team Name must be a string'),
        ];
    }
}
