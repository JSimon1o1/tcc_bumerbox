<?php

namespace App\Models;

use App\Traits\AuditionUsers;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use AuditionUsers;

    protected $primaryKey = 'id';
    protected $table = 'paises';
    public $timestamps = false;
    protected $fillable = ['nome', 'codigo'];
}
