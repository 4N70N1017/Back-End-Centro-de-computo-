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
        DB::table('aulas')->insert([
            [
                'nombre' => 'Aula de cómputo',
                'descripcion' => 'Módulo 1: Aula de cómputo',
                'ubicacion' => 'Módulo 1',
            ],
            [
                'nombre' => 'Aula de capacitación A',
                'descripcion' => 'Módulo 2: Aula de capacitación A',
                'ubicacion' => 'Módulo 2',
            ],
            [
                'nombre' => 'Aula de capacitación B',
                'descripcion' => 'Módulo 2: Aula de capacitación B',
                'ubicacion' => 'Módulo 2',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('aulas')->whereIn('nombre', [
            'Aula de cómputo',
            'Aula de capacitación A',
            'Aula de capacitación B',
        ])->delete();
    }
};
