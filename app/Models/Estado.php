<?php

namespace App\Models;

use App\Traits\AuditionUsers;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use AuditionUsers;

    protected $primaryKey = 'id';
    protected $table = 'estados';
    public $timestamps = false;
    protected $fillable = ['pais_codigo', 'nome', 'codigo'];
}
