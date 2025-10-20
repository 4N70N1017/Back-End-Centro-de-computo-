<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\API_UsuarioController;
use App\Http\Controllers\Api\API_AuthController;


Route::post('/usuarios/guardar',[API_UsuarioController::class, 'guardar_usuario']);
Route::post('/auth/inicar-sesion',[API_AuthController::class, 'iniciar_sesion']);

//Rutas para usuarios autenticados
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/cerrar-sesion', [API_AuthController::class, 'cerrar_sesion']);
});
