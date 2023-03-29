<?php

namespace App\Models;

use App\Traits\AuditionUsuarios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes, AuditionUsuarios;

    protected $primaryKey = 'id';
    protected $table = 'enderecos';
    protected $fillable = ['usuario_id', 'cidade_id', 'rua', 'cep', 'numero'];
}
