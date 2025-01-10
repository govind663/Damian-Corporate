<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                'product_id' => 'required|numeric',
                'citizen_id' => 'required|numeric',
                'cart_id' => 'required|numeric',
                'order_status' => 'required|numeric',
                'order_date' => 'required|string',
                'order_total_price' => 'required|string',
                'payment_status' => 'required|numeric',
                'payment_date' => 'required|string',
                'postcode' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|numeric',
                'country' => 'required|string|max:255',
                'street_address' => 'required|string|max:255',
                'shipping' => 'required|string'
            ];
        }else{
            $rule = [
                'product_id' => 'required|numeric',
                'citizen_id' => 'required|numeric',
                'cart_id' => 'required|numeric',
                'order_status' => 'required|numeric',
                'order_date' => 'required|string',
                'order_total_price' => 'required|string',
                'payment_status' => 'required|numeric',
                'payment_date' => 'required|string',
                'postcode' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|numeric',
                'country' => 'required|string|max:255',
                'street_address' => 'required|string|max:255',
                'shipping' => 'required|string'
            ];
        }

        return $rule;
    }

    public function messages()
    {
        return [
            'product_id.required' => 'The product id is required.',
            'citizen_id.required' => 'The citizen id is required.',
            'cart_id.required' => 'The cart id is required.',
            'order_status.required' => 'The order status is required.',
            'order_date.required' => 'The order date is required.',
            'order_total_price.required' => 'The order total price is required.',
            'payment_status.required' => 'The payment status is required.',
            'payment_date.required' => 'The payment date is required.',

            'postcode.required' => 'The postcode is required.',
            'city.required' => 'The city is required.',
            'state.required' => 'The state is required.',
            'country.required' => 'The country is required.',
            'street_address.required' => 'The street address is required.',
            'shipping.required' => 'The shipping is required.',
        ];
    }
}
