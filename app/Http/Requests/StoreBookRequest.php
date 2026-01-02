<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'published_year' => ['required', 'integer', 'between:1900,2100'],
            'is_available' => ['sometimes', 'boolean'],
            'cover_color' => ['nullable', 'string'],
            'cover_format' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The book title is required',
            'title.string' => 'The book title must be a valid text',
            'author.required' => 'The author name is required',
            'author.string' => 'The author name must be a valid text',
            'published_year.required' => 'The published year is required',
            'published_year.integer' => 'The published year must be a valid year',
            'published_year.between' => 'The published year must be between 1900 and 2100',
        ];
    }
}
