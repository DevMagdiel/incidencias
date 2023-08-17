<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
    ];

    public $timestamps = false;

    protected $table = 'tipos_usuarios';

    /* RELACION UNO A MUCHOS */
    public function usuarios(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
