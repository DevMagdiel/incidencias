<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
    ];

    public $timestamps = false;

    /* RELACION UNO A MUCHOS */
    public function usuarios(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
