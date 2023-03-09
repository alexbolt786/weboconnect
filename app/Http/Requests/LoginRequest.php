<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
			'email' => 'required|email|min:3|max:50',
			'password' => 'required|min:8|max:50'
        ];
    }
}