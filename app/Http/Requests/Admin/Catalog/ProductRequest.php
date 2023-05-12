<?php

namespace App\Http\Requests\Admin\Catalog;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category' => 'required',
            'code' => 'required',
            'title' => 'required',
            'description' => 'required',
            'attributes' => 'nullable|array',
            'values' => 'nullable|array',
            'thumbnail' => 'nullable|image'
        ];
    }
}
