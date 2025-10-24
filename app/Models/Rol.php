<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

    protected $table = 'roles';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'esta_activo',
    ];

    //Relaciones
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }
}
