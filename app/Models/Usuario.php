<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, $codigo)
 */
class Usuario extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'usuarios';

    protected $fillable = ['nome', 'codigo', 'iso2', 'iso3'];
}
