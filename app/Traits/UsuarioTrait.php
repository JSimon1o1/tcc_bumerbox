<?php

namespace App\Traits;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

trait UsuarioTrait
{
    protected function setSenhaAttribute($senha): string
    {
        return $this->attributes['senha'] = Hash::make($senha);
    }

    protected function getIsCpfOrCnpjAttribute(): string
    {
        $cpfcnpj = preg_replace('/\D/', '', $this->cpfcnpj);
        if (strlen($cpfcnpj) == 11) {
            return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpfcnpj);
        } else if (strlen($cpfcnpj) == 14) {
            return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cpfcnpj);
        } else {
            return '';
        }
    }

    protected function getIsfidelizadoAttribute(): string
    {
        return $this->fidelizado ? 'Sim' : 'Não';
    }

    protected function getDataNascimentoBrAttribute(): string
    {
        return $this->data_nascimento ? Carbon::parse($this->data_nascimento)->format('d/m/Y') : '';
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
