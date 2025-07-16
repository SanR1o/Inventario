<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rutas solo para admin
    Route::middleware('admin')->group(function () {
        Route::resource('usuarios', UserController::class);
            Route::resource('categorias', CategoriaController::class);
            Route::resource('subcategorias', SubcategoriaController::class);
            Route::resource('productos', ProductoController::class);
    });

    // Rutas para coordinador (puede ver y editar pero no eliminar)
    Route::middleware('coordinador')->group(function () {
        Route::resource('productos', ProductoController::class)->except(['destroy']);
        Route::resource('categorias', CategoriaController::class)->except(['destroy']);
        Route::resource('subcategorias', SubcategoriaController::class)->except(['destroy']);
    });
});

require __DIR__.'/auth.php';