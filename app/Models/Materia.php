<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'esta_activo'
    ];

    protected $casts = [
        'esta_activo' => 'boolean'
    ];

    //Relaciones
     public function usuarios()
    {
        return $this->belongsToMany(Usuario::class,'usuario_materia','materia_id','usuario_id');
    }
}
