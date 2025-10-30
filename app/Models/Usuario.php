<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        'id_rol',
        'id_empleado',
        'correo',
        'contrasena',
        'esta_activo',
    ];

    protected $hidden = ['contrasena'];

    //Relaciones
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    } 

    public function materias()
    {
        return $this->belongsToMany(Materia::class,'usuario_materia','usuario_id', 'materia_id');
    }

    public function peticionesReserva()
    {
        return $this->hasMany(PeticionReserva::class, 'usuario_id');
    }

    //PARA LA AUTENTICACION
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
