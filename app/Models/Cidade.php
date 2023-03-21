<?php

namespace App\Models;

use App\Traits\AuditionUsers;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use AuditionUsers;

    protected $primaryKey = 'id';
    protected $table = 'cidades';
    public $timestamps = false;
}
