<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstatusReserva extends Model
{
    protected $table = 'estatus_peticiones_reserva';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'esta_activo',
    ];
    public function peticionesReserva()
    {
        return $this->hasMany(PeticionReserva::class, 'estatus_peticiones_reserva_id');
    }
}
