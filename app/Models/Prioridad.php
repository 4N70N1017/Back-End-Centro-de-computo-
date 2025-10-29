<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    protected $table = 'prioridad';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'esta_activo',
    ];

    protected $casts = [
        'esta_activo' => 'boolean',
    ];
}
