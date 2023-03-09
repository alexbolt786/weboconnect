<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultiPartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'firstName' => 'required|min:1|max:20',
			'lastName' => 'required|min:1|max:20',
			'image' => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:4096'
        ];
    }
}