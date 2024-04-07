<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpsertRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'due_date' => 'required|date',
            'parent_id' => 'nullable|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
        ];
    }
}
