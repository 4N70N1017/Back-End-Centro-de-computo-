<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\API_UsuarioController;

Route::post('/usuarios/guardar',[API_UsuarioController::class, 'guardar_usuario']);
