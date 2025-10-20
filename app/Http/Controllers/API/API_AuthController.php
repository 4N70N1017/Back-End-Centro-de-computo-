<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class API_AuthController extends Controller
{
    public function iniciar_sesion(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario || !Hash::check($request->contrasena, $usuario->contrasena)) {
            return response()->json([
                'ok' => false,
                'mensaje' => 'Credenciales incorrectas.',
            ], 401);
        }

        if (!$usuario->esta_activo) {
            return response()->json([
                'ok' => false,
                'mensaje' => 'El usuario está inactivo.',
            ], 403);
        }

        // Generar token con Sanctum
        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json([
            'ok' => true,
            'token' => $token,
            /*
            'usuario' => [
                'id' => $usuario->id,
                'correo' => $usuario->correo,
                'rol' => $usuario->rol->nombre ?? null,
                'empleado' => $usuario->empleado,
            ],*/
        ],200);
    }

    public function cerrar_sesion(Request $request)
    {   
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'ok' => true,
            'mensaje' => 'Sesión cerrada correctamente.'
        ],200);
    }
}
