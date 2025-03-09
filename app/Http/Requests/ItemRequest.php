<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
    public function rules()
    {
        return [
            'product_name' => 'max:255|string|required',
            'product_description' => 'required|max:255|string',
            'category' => 'required',
            'quantity' => 'numeric',
            'price' => 'numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'image' => 'The image type should be: jpeg,png,jpg,gif'
        ];
    }
}
