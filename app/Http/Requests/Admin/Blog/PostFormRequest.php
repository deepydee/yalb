<?php

namespace App\Http\Requests\Admin\Blog;

use App\Models\Admin\Blog\BlogPost;
use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('web')->check() && auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'nullable',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
            'status' => 'nullable',
            'is_featured' => 'nullable',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'status' => (bool) ($this->status) ?
                            'published' :
                            'draft',
            'is_featured' => (bool) $this->is_featured,
        ]);
    }

    // protected function passedValidation(): void
    // {
    //     if ($file = BlogPost::uploadImage($this, $this->thumbnail)) {
    //         $this->merge([
    //             'thumbnail' => $file,
    //         ]);
    //     }
    // }
}
