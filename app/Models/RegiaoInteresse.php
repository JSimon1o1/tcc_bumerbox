<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegiaoInteresse extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'regioes_interesses';
}
