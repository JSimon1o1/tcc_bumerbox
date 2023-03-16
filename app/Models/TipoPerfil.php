<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPerfil extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'tipos_perfis';
}
