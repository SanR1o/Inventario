<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dasboard', function(){
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categorias', CategoriaController::class);
Route::resource('subategorias', SubategoriaController::class);
Route::resource('productos', ProductoController::class);
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('usuarios', UserController::class);
});
Route::middleware(['auth', 'coordinador'])->group(function () {
    Route::resource('productos', ProductoController::class)->except(['destroy']);
    Route::resource('categorias', CategoriaController::class)->except(['destroy']);
    Route::resource('subategorias', SubategoriaController::class)->except(['destroy']);
});

require __DIR__.'/auth.php';