<?php

namespace App\Traits;

use App\Models\Usuario;
use Carbon\Carbon;

trait TelefoneTrait
{
    protected function getIsNumeroAttribute(): string
    {
        $telefone = preg_replace('/\D/', '', $this->numero);
        if (strlen($telefone) == 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
        } else if (strlen($telefone) == 11) {
            return preg_replace('/(\d{2})(\d)(\d{4})(\d{4})/', '($1) $2 $3-$4', $telefone);
        }
        return '';
    }

    protected function getCriadoEmAttribute(): string
    {
        return $this->created_at ? Carbon::parse($this->created_at)->format('d/m/Y H:i:s') : '';
    }

    protected function getModificadoEmAttribute(): string
    {
        return $this->updated_at ? Carbon::parse($this->updated_at)->format('d/m/Y H:i:s') : '';
    }

    protected function getCriadoPorAttribute(): string
    {
        return $this->created_by ? Usuario::find($this->created_by)->nome : '';
    }

    protected function getModificadoPorAttribute(): string
    {
        return $this->updated_by ? Usuario::find($this->updated_by)->nome : '';
    }
}
