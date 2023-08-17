<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable=[
        'equipo_id',
        'responsable_id',
        'estatus_id',
        'encargado_id',
        'titulo',
        'comentario',
        'comentario_solucion',
        'fecha_inicial',
        'fecha_estimada',
        'fecha_solucion',
        'evidencia_problema',
        'evidencia_solucion',
    ];

    public $timestamps = false;

    /* RELACION PERTENECE A  */
    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }

    public function estatusReporte(): BelongsTo
    {
        return $this->belongsTo(EstatusReporte::class,'estatus_id');
    }

    public function userResponsable(): BelongsTo
    {
        return $this->belongsTo(User::class,'responsable_id');
    }

    public function userEncargado(): BelongsTo
    {
        return $this->belongsTo(User::class, 'encargado_id');
    }
    
}
