<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required|exists:todo_categories,id',
            'status' => 'nullable',
            'share.*.email' => 'exists:users,email'
        ];
    }
}
