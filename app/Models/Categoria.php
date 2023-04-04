<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes, AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'categorias';
    protected $fillable = ['nome', 'desconto'];
}
