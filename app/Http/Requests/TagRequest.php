<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3'],
            'slug' => ['required', 'string', 'min:3', Rule::unique('tags')->where(function ($query) {
                return $this->tag ? $query->where('id', '!=', $this->tag->id) : $query;
            })],
            'meta_title' => ['sometimes', 'required', 'string', 'min:3'],
            'meta_description' => ['required', 'string', 'max:155'],
        ];
    }
}