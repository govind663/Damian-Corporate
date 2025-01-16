<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                'banner_image' => 'mimes:jpeg,png,jpg|max:2048',
                'banner_video' => 'mimes:mp4|max:20000',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'banner_image' => 'mimes:jpeg,png,jpg|max:2048',
                'banner_video' => 'mimes:mp4|max:20000',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [

            'banner_image.mimes' => __('Banner image must be a file of type: jpeg, png, jpg'),
            'banner_image.max' => __('The size of banner image should not exceed 2 MB.'),

            'banner_video.mimes' => __('Banner video must be a file of type: mp4.'),
            'banner_video.max' => __('The size of banner video should not exceed 20 MB.'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number.'),

        ];
    }
}
