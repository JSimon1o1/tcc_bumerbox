<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use SoftDeletes, AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'perfis';
    protected $fillable = ['usuario_id', 'tipo_perfil_codigo'];

    public function usuario(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class);
    }
}
