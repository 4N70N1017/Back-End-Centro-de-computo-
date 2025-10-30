<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeticionReserva extends Model
{
    protected $table = 'peticiones_reserva';

    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'materia_id',
        'aula_id',
        'tipo_reserva_id',
        'horario_id',
        'estatus_peticiones_reserva_id',
        'fecha_peticion',
        'fecha_dia_reservada',
        'esta_activo',
    ];

    protected $casts = [
        'fecha_peticion' => 'date',
        'fecha_dia_reservada' => 'date',
        'esta_activo' => 'boolean',
    ];

    //Relaciones
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }

    public function tipoReserva()
    {
        return $this->belongsTo(TipoReserva::class, 'tipo_reserva_id');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }

    public function estatus()
    {
        return $this->belongsTo(EstatusReserva::class, 'estatus_peticiones_reserva_id');
    }
}
