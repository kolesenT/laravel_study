<?php

namespace App\Http\Requests\Api\Movie;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:1', 'max:255'],
            'year' => ['required', 'integer'],
            'description' => ['required', 'min:100'],
            'genres' => ['required', 'array', 'min:1'],
            'genres.*' => ['required', 'exists:genres,id'],
            'actors' => ['required', 'array', 'min:1'],
            'actors.*' => ['required', 'exists:actors,id'],
        ];
    }
}
