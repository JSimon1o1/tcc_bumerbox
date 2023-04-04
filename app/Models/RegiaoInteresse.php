<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegiaoInteresse extends Model
{
    use SoftDeletes, AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'regioes_interesse';
    protected $fillable = ['nome'];
}
