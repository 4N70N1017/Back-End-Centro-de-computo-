<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('tipo_reserva')->insert([
            [
                'nombre' => 'Clase',
                'descripcion' => 'Clase regular de alguna materia',
                'prioridad_id' => 1,
            ],
            [
                'nombre' => 'Examen regular',
                'descripcion' => 'Examen regular de alguna materia',
                'prioridad_id' => 2,
            ],
            [
                'nombre' => 'Examen ordinario',
                'descripcion' => 'Examen ordinario de alguna materia',
                'prioridad_id' => 3,
            ],
            [
                'nombre' => 'Examen extraordinario',
                'descripcion' => 'Examen extraordinario de alguna materia',
                'prioridad_id' => 3,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('tipo_reserva')
        ->whereIn('nombre', [
            'Clase',
            'Examen regular',
            'Examen ordinario',
            'Examen extraordinario'
        ])
        ->delete();
    }
};
