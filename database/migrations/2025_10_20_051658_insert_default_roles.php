<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Insertamos manualmente los rooles preedefinidos
        DB::table('roles')->insert([
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Rol con acceso total al sistema',
                'esta_activo' => true,
            ],
            [
                'nombre' => 'Maestro',
                'descripcion' => 'Rol con acceso limitado para docentes',
                'esta_activo' => true,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Elimina los roles insertados si se revierte la migración
        DB::table('roles')
            ->whereIn('nombre', ['Administrador', 'Maestro'])
            ->delete();
    }
};
