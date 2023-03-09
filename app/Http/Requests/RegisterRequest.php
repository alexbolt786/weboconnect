<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email' => 'required|min:3|max:50|email:rfc,dns|unique:users,email',
            'firstName' => 'required|min:1|max:20',
            'lastName' => 'required|min:1|max:20',
            'password' => 'required|min:8|max:50'
        ];
    }
}
