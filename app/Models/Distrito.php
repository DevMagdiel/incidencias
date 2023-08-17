<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distrito extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'distrito',
    ];

    public $timestamps = false;


    /* RELACION UNO A  MUCHOS */
    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class);
    }
}
