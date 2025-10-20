<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'fecha_de_ingreso',
        'telefono',
        'url_foto',
        'esta_activo',
    ];

    //Relaciones
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_empleado');
    }
}
