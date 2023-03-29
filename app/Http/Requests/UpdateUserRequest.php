<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cpfcnpj' => Str::replace(['.', '-', '/'], '', $this->get('cpfcnpj')),
            'visivel' => $this->has('visivel'),
            'fidelizado' => $this->has('fidelizado'),
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:255',
            'cpfcnpj' => 'required|min:11|max:18|unique:usuarios,cpfcnpj,' . $this->usuario->id . ',id',
            'data_nascimento' => 'nullable|date_format:Y-m-d',
        ];
    }

    public function messages(): array
    {
        return [
            'cpfcnpj.unique' => 'O campo :attribute já possuí um registro',
            'date_format' => 'O campo :attribute deve conter um valor válido',
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve possuir pelo menos :min carateres',
            'max' => 'O campo :attribute deve possuir no máximo :max carateres',
        ];
    }
}
