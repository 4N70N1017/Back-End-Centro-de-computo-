<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Empleado;
use App\Models\Usuario;

class API_UsuarioController extends Controller
{
    public function guardar(Request $request)
    {
        // Validación conjunta de datos del empleado y del usuario
        $validator = Validator::make($request->all(), [
            'id_rol' => 'required|exists:roles,id',
            'correo' => 'required|email|unique:usuarios,correo',
            'contrasena' => 'required',
            'esta_activo' => 'boolean',

            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string',
            'url_foto' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Errores de validación',
                'errores' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Crear empleado
            $empleado = Empleado::create([
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'fecha_de_ingreso' => now()->toDateString(),
                'telefono' => $request->telefono,
                'url_foto' => $request->url_foto,
            ]);

            // Crear usuario vinculado al empleado
            $usuario = Usuario::create([
                'id_rol' => $request->id_rol,
                'id_empleado' => $empleado->id,
                'correo' => $request->correo,
                'contrasena' => Hash::make($request->contrasena),
            ]);

            DB::commit();

            return response()->json([
                'mensaje' => 'Usuario y empleado creados correctamente',
                'usuario' => $usuario,
                'empleado' => $empleado,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'mensaje' => 'Error al guardar los datos',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

}
