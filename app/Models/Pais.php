<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'paises';
    public $timestamps = false;
    protected $fillable = ['nome', 'codigo'];
}
