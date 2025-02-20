<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:10',
            'email' => [
                'sometimes',
                'email',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'password' => 'nullable|string|min:6',
        ];
    }
}
