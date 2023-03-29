<?php

namespace App\Models;

use App\Traits\AuditionUsuarios;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use AuditionUsuarios;

    protected $primaryKey = 'id';
    protected $table = 'paises';
    public $timestamps = false;
    protected $fillable = ['nome', 'codigo'];
}
