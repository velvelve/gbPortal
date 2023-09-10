<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\News;

use App\Enums\News\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class Edit extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:150'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
            'status' => ['required', new Enum(Status::class)],
            'description' => ['nullable', 'string'],
        ];
    }


    public function messages()
    {
        return [
            'required' => 'Для этой формы заполнение поля :attribute обязательно'
        ];
    }


    public function attributes()
    {
        return [
            'title' => 'Заголовок статьи'
        ];
    }
}
