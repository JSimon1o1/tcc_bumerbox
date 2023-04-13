<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Rules\ValidaSenha;
use Illuminate\Validation\Rules\Password;

class StoreMinhaContaRequest extends FormRequest
{
    /*
    public function authorize(): bool
    {
        return true;
    }
    */

    public function rules(): array
    {
        return [
            'senha_antiga' => [
                'required',
                new ValidaSenha
            ],
            'nova_senha' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()->symbols()
                    ->uncompromised()
            ],
            'nova_senha_confirmar' => 'required|same:nova_senha'
        ];
    }

    public function messages(): array
    {
        return [
            'senha_antiga' => 'Senha antiga informada inválida.',
            'nova_senha' => [
                'O campo :attribute deve conter pelo menos uma letra maiúscula e uma minúscula.',
                "O campo :attribute deve conter pelo menos um símbolo.",
                "O campo :attribute deve conter pelo menos um número.",
            ],
            'nova_senha_confirmar' => 'O campo :attribute não é igual a nova senha informada.',
        ];
    }
}
