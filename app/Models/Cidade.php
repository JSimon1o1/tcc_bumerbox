<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'cidades';
    public $timestamps = false;
    protected $fillable = ['estado_codigo', 'nome'];
}
