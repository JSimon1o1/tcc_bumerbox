<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fidelizacao extends Model
{
    use SoftDeletes, AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'fidelizacoes';
    protected $fillable = ['categoria_id', 'usuario_id', 'valor_receber'];
}
