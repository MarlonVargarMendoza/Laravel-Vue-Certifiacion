<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
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
            'title' => 'required|min:5|max:100',
            'categories_id' => 'required|integer',
            'slug' => 'required',
            'content' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpe,jpg,png|max:10240'
        ];
    }
}
