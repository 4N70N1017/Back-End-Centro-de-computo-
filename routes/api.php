<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\API_UsuarioController;
use App\Http\Controllers\Api\API_AuthController;


Route::post('/usuarios',[API_UsuarioController::class, 'guardar']);
Route::post('/auth/login',[API_AuthController::class, 'iniciar']);

//Rutas para usuarios autenticados
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [API_AuthController::class, 'cerrar']);
});
