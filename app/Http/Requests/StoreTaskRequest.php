<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:40',
            'description' => 'nullable|string',
            'priority' => 'required|integer|min:1|max:10'
        ];
    }

}
