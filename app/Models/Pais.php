<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'paises';
    public $timestamps = false;
}
