<?php

namespace App\Http\Requests;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CarFormRequest extends FormRequest
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
        $id = $request->route('car')?->id;

        return [
            'brand' => 'required|string|max:191',
            'model' => 'required|string|max:191',
            'year'  => 'required|numeric|min:1900|max:' . date('Y'),
            'plate' => 'required|string|min:7|max:7|unique:cars,plate' . ($id ? ',' . $id : ''),
        ];
    }

    public function messages(): array
    {
        return [
            'brand.*' => 'O campo "Marca" é obrigatório, deve ser uma palavra ou frase e conter no máximo 191 caracters',
            'model.*' => 'O campo "Modelo" é obrigatório, deve ser uma palavra ou frase e conter no máximo 191 caracters',
            'year.*'  => 'O campo "Ano" é obrigatório deve ser um ano entre 1900 e o ano atual',
            'plate.*' => 'O campo "Placa" é obrigatório, não pode ser repetido e deve ter 7 caracteres',
        ];
    }
}
