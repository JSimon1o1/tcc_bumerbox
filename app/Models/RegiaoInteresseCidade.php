<?php

namespace App\Models;

use App\Traits\AuditionUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegiaoInteresseCidade extends Model
{
    use SoftDeletes, AuditionUsers;

    protected $primaryKey = 'id';
    protected $table = 'regioes_interesse_cidade';
}
