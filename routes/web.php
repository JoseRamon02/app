<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('notas', [ NotasController::class, 'notas' ]);

Route::get('notas/{id?}', [ NotasController::class, 'detalle' ]) -> name('notas.detalle');

Route::post('notas', [ NotasController::class, 'crear' ]) -> name('notas.crear');

Route::get('editar/{id}', [ NotasController::class, 'editar' ]) -> name('notas.editar');

Route::put('editar/{id}', [ NotasController::class, 'actualizar' ]) -> name('notas.actualizar');

Route::delete('eliminar/{id}', [ NotasController::class, 'eliminar' ]) -> name('notas.eliminar');