<?php

namespace App\Http\Requests\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
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
            'title' => 'required',
            'slug' => 'required'
        ];
    }

    public function failedValidation (\Illuminate\Contracts\Validation\Validator $validator)
    {
        if($this->expectsJson()) {
            $response = new HttpResponse($validator->errors(), 422);
            throw new ValidationException($validator, $response);
        }
    }
}
