<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use App\Traits\TelefoneTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone extends Model
{
    use SoftDeletes, AuditionTrait, TelefoneTrait;

    protected $primaryKey = 'id';
    protected $table = 'telefones';
    protected $fillable = ['usuario_id', 'numero'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
}
