<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipo extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'codigo',
        'descripcion',
        'serie',
        'valor',
        'comentario',
        'fecha_asignacion',
        'responsable_id',
        'linea_id',
        'estatus_id',
        'distrito_id',
    ];

    public $timestamps = false;

    /* RELACION UNO A MUCHOS */
    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }


    /* RELACION PERTENECE A  */
    public function distrito(): BelongsTo
    {
        return $this->belongsTo(Distrito::class);
    }

    public function estatusEquipo(): BelongsTo
    {
        return $this->belongsTo(EstatusEquipo::class,'estatus_id');
    }
    
    public function linea(): BelongsTo
    {
        return $this->belongsTo(Linea::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'responsable_id');
    }
}
