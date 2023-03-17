<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'cidades';
    public $timestamps = false;
}
