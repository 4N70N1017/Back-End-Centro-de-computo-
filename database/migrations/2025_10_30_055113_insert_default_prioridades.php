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
        foreach(['Prioridad 1','Prioridad 2','Prioridad 3'] as $prioridad){
            DB::table('prioridad')->insert(['nombre' => $prioridad]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('prioridad')->truncate();
    }
};
