<?php

namespace App\Models;

use App\Traits\AuditionUsuarios;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use AuditionUsuarios;

    protected $primaryKey = 'id';
    protected $table = 'cidades';
    public $timestamps = false;
    protected $fillable = ['estado_codigo', 'nome'];
}
