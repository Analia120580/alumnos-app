<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'  => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('users')->ignore($this->user()->id)],

            // NUEVOS CAMPOS:
            'phone'            => ['nullable','string','max:20'],
            'professional_url' => ['nullable','url','max:255'],
            'photo'            => ['nullable','image','max:2048'], // hasta 2 MB
        ];
    }
}

