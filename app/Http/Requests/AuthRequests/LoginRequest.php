<?php

namespace App\Http\Requests\AuthRequests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'მეილის ველი არ უნდა იყოს ცარიელი',
            'email.email' => 'არასწორი მეილის ფორმატი',
            'password.required' => 'პაროლის ველი არ უნდა იყოს ცარიელი',
            'password.min:6' => 'პაროლის უნდა შედგებოდეს მინიმუმ 6 სიმბოლოსგან',
        ];
    }
}
