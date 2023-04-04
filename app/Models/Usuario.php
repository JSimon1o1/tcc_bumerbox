<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use App\Traits\UsuarioTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes, AuditionTrait, UsuarioTrait;

    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    protected $fillable = ['nome', 'data_nascimento', 'cpfcnpj', 'senha', 'fidelizado', 'visivel'];

    public function perfis(): HasMany
    {
        return $this->hasMany(Perfil::class);
    }
}
