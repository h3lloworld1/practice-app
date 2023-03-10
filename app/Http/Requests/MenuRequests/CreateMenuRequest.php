<?php

namespace App\Http\Requests\MenuRequests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequest extends FormRequest
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
        'sections.*.name' => 'required_if:sections,array|string|max:255',
        'sections.*.status' => 'required_if:sections,array|boolean',
        'sections.*.description' => 'required_if:sections,array|string',
        'additional_info' => 'nullable',
        'ingredients' => 'required',
        'allergens' => 'nullable',
        'thumbnail' => 'nullable',
        'price' => 'required',
        'discount_price' => 'nullable',
        ];
    }
}
