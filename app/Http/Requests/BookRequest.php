<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
     * @return array<string, 
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:20',
            'genre' => 'required|string|max:100',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'status' => 'required|in:available,checked_out,archived',
        ];

        // Add unique rule for ISBN with exception for current book when updating
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['isbn'] = [
                'required',
                'string',
                'max:20',
                Rule::unique('books')->ignore($this->route('book'))
            ];
        } else {
            $rules['isbn'] = 'required|string|max:20|unique:books';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Please enter the book title.',
            'title.max' => 'The title cannot exceed 255 characters.',
            'author.required' => 'Please enter the author\'s name.',
            'author.max' => 'The author name cannot exceed 255 characters.',
            'isbn.required' => 'Please enter the ISBN number.',
            'isbn.unique' => 'This ISBN already exists in our database.',
            'isbn.max' => 'The ISBN cannot exceed 20 characters.',
            'genre.required' => 'Please enter the book genre.',
            'genre.max' => 'The genre cannot exceed 100 characters.',
            'published_year.required' => 'Please enter the publication year.',
            'published_year.integer' => 'The publication year must be a number.',
            'published_year.min' => 'The publication year must be at least 1000.',
            'published_year.max' => 'The publication year cannot exceed ' . date('Y') . '.',
            'status.required' => 'Please select a status.',
            'status.in' => 'Please select a valid status option.',
        ];
    }
}