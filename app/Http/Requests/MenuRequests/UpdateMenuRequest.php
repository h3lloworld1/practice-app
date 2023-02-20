<?php

namespace App\Http\Requests\MenuRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'name' => 'required',
            'status' => 'required',
            'double_meat' => 'nullable',
            'category' => 'required',
            'sauces.*.name' => 'required|string',
            'sauces.*.status' => 'required|boolean',
            'sauces.*.id' => 'nullable',
            'additional_info' => 'nullable',
            'ingredients' => 'required',
            'allergens' => 'nullable',
            'thumbnail' => 'nullable',
            'price' => 'required',
            'discount_price' => 'nullable',
        ];
    }
}
