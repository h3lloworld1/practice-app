<?php

namespace App\Http\Requests\OrderRequests\OrderInProgress;

use Illuminate\Foundation\Http\FormRequest;

class OrderInProgressListingRequest extends FormRequest
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
            'order_by' => 'string'
        ];
    }
}
