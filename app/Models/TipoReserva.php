<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoReserva extends Model
{
    protected $table = 'tipo_reserva';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'prioridad_id',
        'esta_activo',
    ];

    protected $casts = [
        'esta_activo' => 'boolean',
    ];

    // Relaciones
    public function prioridad()
    {
        return $this->belongsTo(Prioridad::class, 'prioridad_id');
    }

    public function peticionesReserva()
    {
        return $this->hasMany(PeticionReserva::class, 'tipo_reserva_id');
    }
}
