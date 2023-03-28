<?php

namespace App\Models;

use App\Traits\AuditionUsers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes, AuditionUsers;

    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    protected $fillable = ['nome', 'sobrenome', 'data_nascimento', 'cpfcnpj', 'senha', 'fidelizado', 'visivel'];

    protected function getNomeCompletoAttribute(): string
    {
        return "$this->nome $this->sobrenome";
    }

    protected function getDataNascimentoBrAttribute(): string
    {
        if (!empty($this->data_nascimento)) {
            return Carbon::parse($this->data_nascimento)->format('d/m/Y');
        }
        return '-';
    }

    protected function getCpfCnpjFormatadoAttribute(): string
    {
        if (strlen($this->cpfcnpj) == 11) {
            return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $this->cpfcnpj);
        }
        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $this->cpfcnpj);
    }

    protected function getFidelizadoSimNaoAttribute(): string
    {
        return $this->fidelizado ? 'Sim' : 'Não';
    }

    protected function getCriadoEmAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }

    protected function getModificadoEmAttribute(): string
    {
        return Carbon::parse($this->updated_at)->format('d/m/Y H:i:s');
    }

    protected function getCriadoPorAttribute(): string
    {
        return Usuario::find(1)->nome ?? '';
    }

    protected function getModificadoPorAttribute(): string
    {
        return Usuario::find(1)->nome ?? '';
    }

}
