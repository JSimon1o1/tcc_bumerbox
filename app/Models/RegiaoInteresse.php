<?php

namespace App\Models;

use App\Traits\AuditionUsuarios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegiaoInteresse extends Model
{
    use SoftDeletes, AuditionUsuarios;

    protected $primaryKey = 'id';
    protected $table = 'regioes_interesse';
    protected $fillable = ['nome'];
}
