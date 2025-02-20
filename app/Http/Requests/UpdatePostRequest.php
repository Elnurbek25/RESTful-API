<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:10',
            'content' => 'sometimes|string',
            'user_id' => 'required|exists:users,id'
        ];
    }
}
