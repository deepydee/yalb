<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'name' => 'nullable|alpha_dash',
            'message' => 'required|string|min:5',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'phone' => preg_replace('/-|\s|\(|\)/', '', $this->phone),
        ]);
    }
}
