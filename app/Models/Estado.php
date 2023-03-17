<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'estados';
    public $timestamps = false;
}
