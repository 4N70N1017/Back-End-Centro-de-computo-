<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\API_UsuarioController;
use App\Http\Controllers\Api\API_HorarioController;
use App\Http\Controllers\Api\API_AuthController;


Route::post('/auth/login',[API_AuthController::class, 'iniciar']);
Route::post('/auth/logout', [API_AuthController::class, 'cerrar'])->middleware('auth:sanctum');

Route::post('/usuarios',[API_UsuarioController::class, 'guardar']);

Route::post('/horarios',[API_HorarioController::class, 'guardar']);
Route::get('/horarios',[API_HorarioController::class, 'listar']);
Route::get('/horarios/{id}',[API_HorarioController::class, 'ver']);