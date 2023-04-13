<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Auth;
use Request;
use Illuminate\Support\Facades\Log;

class ValidaSenha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        Log::error($value);
        if(password_verify($value, Auth::user()->getAuthPassword())){
        } else{
            $fail('Senha antiga informada inválida.');
        }
    }
}
