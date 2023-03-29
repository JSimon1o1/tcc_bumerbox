<?php

namespace App\Models;

use App\Traits\AuditionUsuarios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegiaoInteresseCidade extends Model
{
    use SoftDeletes, AuditionUsuarios;

    protected $primaryKey = 'id';
    protected $table = 'regioes_interesse_cidade';
    protected $fillable = ['regiao_interesse_id', 'cidade_id'];
}
