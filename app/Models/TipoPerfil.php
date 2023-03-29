<?php

namespace App\Models;

use App\Traits\AuditionUsuarios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPerfil extends Model
{
    use SoftDeletes, AuditionUsuarios;

    protected $primaryKey = 'id';
    protected $table = 'tipos_perfil';
    protected $fillable = ['nome', 'codigo', 'visivel'];
}
