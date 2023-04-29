<?php

namespace App\Http\Requests\Registro;

use App\Rules\CpfOuCnpj;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class StoreRegistroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cpfcnpj' => Str::replace(['.', '-', '/'], '', $this->get('cpfcnpj')),
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:255',
            'cpfcnpj' => [
                'required',
                'unique:usuarios,cpfcnpj,NULL,id',
                new CpfOuCnpj
            ],
            'data_nascimento' => 'nullable|date_format:Y-m-d',
            'confirmar_senha' => 'required|same:senha',
            'senha' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'cpfcnpj' => 'O campo :attribute não é um :attribute válido',
            'cpfcnpj.unique' => 'O campo :attribute já possuí um registro',
            'date_format' => 'O campo :attribute deve conter um valor válido',
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve possuir pelo menos :min carateres',
            'max' => 'O campo :attribute deve possuir no máximo :max carateres',
            'confirmar_senha' => 'O campo :attribute deve corresponder à senha.',
            'senha' => [
                'O campo :attribute deve conter pelo menos uma letra maiúscula e uma minúscula',
                "O campo :attribute deve conter pelo menos um símbolo.",
                "O campo :attribute deve conter pelo menos um número.",
                "O campo :attribute possuí uma :attribute fraca. Por favor, forneça uma :attribute mais forte."
            ],

        ];
    }
}
