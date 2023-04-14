<?php

namespace App\Http\Requests;

use App\Rules\ValidaSenha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreMinhaContaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'senha_atual' => [
                'required',
                new ValidaSenha
            ],
            'nova_senha' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'confirmar_senha' => 'required|same:nova_senha'
        ];
    }

    public function messages(): array
    {
        return [
            'senha_atual' => 'O campo :attribute informada inválida.',
            'required' => 'O campo :attribute deve ser preenchido.',
            'nova_senha' => [
                "O campo :attribute deve conter pelo menos uma letra maiúscula e uma minúscula",
                "O campo :attribute deve conter pelo menos um símbolo.",
                "O campo :attribute deve conter pelo menos um número.",
                "O campo :attribute possuí uma :attribute fraca. Por favor, forneça uma :attribute mais forte."
            ],
            'confirmar_senha' => 'O campo :attribute não é igual a nova senha informada.',
        ];
    }
}
