<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'estados';
    public $timestamps = false;
    protected $fillable = ['pais_codigo', 'nome', 'codigo'];
}
