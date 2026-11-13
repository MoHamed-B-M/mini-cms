<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('manage-categories');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le champ nom est obligatoire.',
            'slug.required' => 'Le champ slug est obligatoire.',
            'slug.unique' => 'Ce slug est déjà utilisé par une autre catégorie.',
        ];
    }
}
