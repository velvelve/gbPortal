<?php

namespace App\Http\Requests\DataUpload;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer' => ['required', 'string', 'min:3', 'max:150'],
            'phone' => ['required', 'digits:10'],
            'email' => ['required', 'email'],
        ];
    }
}
