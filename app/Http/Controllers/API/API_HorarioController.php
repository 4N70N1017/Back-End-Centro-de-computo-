<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;

class API_HorarioController extends Controller
{       
    public function guardar(Request $request)
    {
        $validated = $this->validarRequestGuardar($request);
        $horario = Horario::create($validated);

        return response()->json([
            'mensaje' => 'Horario creado correctamente',
            'horario' => $horario
        ], 201);
    }

    public function listar(){
        $horarios = Horario::orderBy('hora_inicio', 'asc')->get();

        return response()->json([
            'mensaje'  => 'Lista de horarios obtenida correctamente',
            'total'    => $horarios->count(),
            'horarios' => $horarios,
        ], 200);
    }

    protected function validarRequestGuardar(Request $request)
    {   
        /* NOTAS
            - No se puede registrar un horario que ya existe

            - Se permite el solapamiento de horarios es decir:
                    Ejemplo, si existe el horario 12:00 a 13:00
                Es valido el horario 12:30 a 13:30

            - El horario es 24 hrs, ejemplo:
                00:00, ...,  12:00, 13:00, ..., 23:59
        */

        $validated = $request->validate([
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin'    => 'required|date_format:H:i|after:hora_inicio',
            'esta_activo' => 'boolean',
        ], [ //Traducciones a español
            'hora_inicio.required'    => 'La hora de inicio es obligatoria.',
            'hora_inicio.date_format' => 'La hora de inicio debe tener el formato HH:MM (24 horas).',
            'hora_fin.required'       => 'La hora de fin es obligatoria.',
            'hora_fin.date_format'    => 'La hora de fin debe tener el formato HH:MM (24 horas).',
            'hora_fin.after'          => 'La hora de fin debe ser posterior a la hora de inicio.',
            'esta_activo.boolean'     => 'El estado activo debe ser verdadero o falso.',
        ]);

        // Validar duplicado
        $existe = Horario::where('hora_inicio', $validated['hora_inicio'])
                ->where('hora_fin', $validated['hora_fin'])
                ->exists();

        if ($existe) {
            abort(response()->json([
                'mensaje' => 'Error de validación',
                'error' => 'Ya existe un horario con el mismo rango de horas.',
            ], 422));
        }

        return $validated;
    }

}
