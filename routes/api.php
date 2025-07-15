<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('subcategorias', SubategoriaController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('usuarios', UserController::class);