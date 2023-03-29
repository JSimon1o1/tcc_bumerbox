<?php

namespace App\Models;

use App\Traits\AuditionUsuarios;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use AuditionUsuarios;

    protected $primaryKey = 'id';
    protected $table = 'estados';
    public $timestamps = false;
    protected $fillable = ['pais_codigo', 'nome', 'codigo'];
}
