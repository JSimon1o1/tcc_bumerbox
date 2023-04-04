<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Autenticacao extends User
{
    protected $primaryKey = 'id';
    protected $table = 'usuarios';

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
