<?php

namespace App\Http\Requests\OrderRequests;

use Illuminate\Foundation\Http\FormRequest;

class OrderSentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'sauce' => 'required|string',
            'double_meat' => 'required|boolean',
            'additional_info' => 'nullable',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'total_price' => 'nullable|integer',
            'accepted' => 'required|boolean',
        ];
    }
}
