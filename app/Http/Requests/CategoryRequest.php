<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'category_name' => 'required|string|max:255|min:3'
        ];
    }
    public function messages(): array
    {
        return [
            'category_name.required' => 'The category name is required',
            'category_name.min' => 'The category name length must be at least 3'
        ];
    }
}
