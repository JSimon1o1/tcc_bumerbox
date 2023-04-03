<?php

namespace App\Models;

use App\Traits\AuditionUsuarios;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes, AuditionUsuarios;

    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    protected $fillable = ['nome', 'data_nascimento', 'cpfcnpj', 'senha', 'confirmar_senha', 'fidelizado', 'visivel'];

    public function perfis(): HasMany
    {
        return $this->hasMany(Perfil::class);
    }

    protected function getIsCpfOrCnpjAttribute(): string
    {
        if (strlen($this->cpfcnpj) == 11) {
            return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $this->cpfcnpj);
        } else if (strlen($this->cpfcnpj) == 14) {
            return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $this->cpfcnpj);
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
