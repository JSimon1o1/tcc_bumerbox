<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfOuCnpj implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->validaCpf($value)) {
            $fail('The :attribute is invalid');
        }

        if (!$this->validaCnpj($value)) {
            $fail('The :attribute is invalid');
        }
    }

    protected function validaCpf(mixed $value): bool
    {
        $value = preg_replace('/\D/', '', $value);

        if (strlen($value) != 11 || preg_match("/^{$value[0]}{11}$/", $value)) {
            return false;
        }

        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $value[$i++] * $s--) ;

        if ($value[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $value[$i++] * $s--) ;

        if ($value[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;
    }

    protected function validaCnpj(mixed $value): bool
    {
        $value = preg_replace('/\D/', '', $value);

        $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        if (strlen($value) != 14) {
            return false;

        } elseif (preg_match("/^{$value[0]}{14}$/", $value) > 0) {

            return false;
        }

        for ($i = 0, $n = 0; $i < 12; $n += $value[$i] * $b[++$i]) ;

        if ($value[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($i = 0, $n = 0; $i <= 12; $n += $value[$i] * $b[$i++]) ;

        if ($value[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;
    }

}
