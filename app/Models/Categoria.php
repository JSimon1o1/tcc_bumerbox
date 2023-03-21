<?php

namespace App\Models;

use App\Traits\AuditionUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes, AuditionUsers;

    protected $primaryKey = 'id';
    protected $table = 'categorias';
}
