<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:40',
            'description' => 'sometimes|string',
            'priority' => 'sometimes|integer|min:1|max:10'
        ];
    }
}
