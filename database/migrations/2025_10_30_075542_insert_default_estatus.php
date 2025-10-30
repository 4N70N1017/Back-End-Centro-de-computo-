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
        foreach(['Pendiente','Aceptada','Rechazada'] as $estatus){
            DB::table('estatus_peticiones_reserva')->insert(['nombre' => $estatus]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('estatus_peticiones_reserva')
        ->whereIn('nombre', ['Pendiente', 'Aceptado', 'Rechazado'])
        ->delete();
    }
};
