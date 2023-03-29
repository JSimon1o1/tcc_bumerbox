<?php

namespace App\Models;

use App\Traits\AuditionUsuarios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use SoftDeletes, AuditionUsuarios;

    protected $primaryKey = 'id';
    protected $table = 'perfis';
    protected $fillable = ['usuario_id', 'tipo_perfil_codigo'];
}
