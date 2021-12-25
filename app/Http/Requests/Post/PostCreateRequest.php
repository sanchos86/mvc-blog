<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:6'],
            'text' => ['required', 'string'],
            'slug' => ['required', 'string', 'min:3', 'unique:posts,slug'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tags' => ['array', 'exists:tags,id'],
            'picture' => ['required', 'image'],
            'meta_title' => ['sometimes', 'required', 'string', 'min:3'],
            'meta_description' => ['required', 'string', 'max:155'],
        ];
    }
}
