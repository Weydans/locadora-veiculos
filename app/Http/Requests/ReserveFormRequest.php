<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveFormRequest extends FormRequest
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
            'date' => "required|date|after_or_equal:date",
        ];
    }

    public function messages(): array
    {
        return [
            'date.*' => 'O campo "Data é obrigatório e deve ser maior ou igual à data atual"',
        ];
    }
}
