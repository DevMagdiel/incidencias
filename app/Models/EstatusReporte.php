<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstatusReporte extends Model
{
    use HasFactory;

    protected $fillable=[
        'estatus',
    ];

    public $timestamps = false;


    /* RELACION UNOS A MUCHOS */
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class,'estatus_id');
    }
}
