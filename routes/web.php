<?php

use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [usuariosController::class, 'leer'])->name('usuarios.leer');

// Rutas de usuarios
Route::get('/usuarios/crear', [usuariosController::class, 'crear'])->name('usuarios.crear');
Route::post('/usuarios/guardar', [usuariosController::class, 'guardar'])->name('usuarios.guardar');
Route::get('/usuarios/leer', [usuariosController::class, 'leer'])->name('usuarios.leer');
Route::put('/usuarios/{usuarios}', [usuariosController::class, 'actualizar'])->name('usuarios.actualizar');
Route::delete('/usuarios/eliminar/{id}', [usuariosController::class, 'eliminar'])->name('usuarios.eliminar');