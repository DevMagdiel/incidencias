<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstatusEquipo extends Model
{
    use HasFactory;

    protected $fillable=[
        'estatus',
    ];

    public $timestamps = false;


    /* RELACION UNOS A MUCHOS */
    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class,'estatus_id');
    }
}
