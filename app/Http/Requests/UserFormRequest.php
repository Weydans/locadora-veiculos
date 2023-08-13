<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserFormRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        $id = $request->route('user')?->id;

        return [
            'name' => 'required|string|max:191|min:3',
            'email' => 'required|email|max:191|unique:users,email' . ($id ? ',' . $id : ''),
            'document' => 'required|cpf|unique:users,document' . ($id ? ',' . $id : ''),
            'password' => 'required|string|min:6|max:191',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.*' => 'O campo "Nome" é obrigatório, deve ser uma palavra ou frase e conter no máximo 191 caracters',
            'email.*' => 'O campo "E-mail" é obrigatório, deve ser um e-mail válido e conter no máximo 191 caracters',
            'document' => 'O campo "CPF" deve receber um CPF válido e deve ser único',
            'password.*'  => 'O campo "Senha" é obrigatório, deve ser uma palavra, pode conter números e caracteres especiais, ter no mínimo 6 e no máximo 191 caracteres',
            'confirm_password.*' => 'O campo "Confirmar senha" é obrigatório, deve ser uma palavra, pode conter números e caracteres especiais, ter no mínimo 6 e no máximo 191 caracteres e ser igual ao campo senha',
        ];
    }
}
