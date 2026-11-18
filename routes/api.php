<?php

use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EntrenadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('entrenadors/list', [EntrenadorController::class, 'index'])->name('api.v1.entrenadors.index');
Route::post('entrenadors/store', [EntrenadorController::class, 'salida'])->name('api.v1.entrenadors.store');
Route::get('entrenadors/{id}', [EntrenadorController::class, 'show'])->name('api.v1.entrenadors.show');
Route::put('entrenadors/{entrenadors}', [EntrenadorController::class, 'update'])->name('api.v1.entrenadors.update');
Route::delete('entrenadors/{entrenadors}', [EntrenadorController::class, 'destroy'])->name('api.v1.entrenadors.destroy');

Route::get('disciplinas/list', [DisciplinaController::class, 'index'])->name('api.v1.disciplinas.index');
Route::post('disciplinas/store', [DisciplinaController::class, 'salida'])->name('api.v1.disciplinas.store');
Route::get('disciplinas/{id}', [DisciplinaController::class, 'show'])->name('api.v1.disciplinas.show');
Route::put('disciplinas/{disciplinas}', [DisciplinaController::class, 'update'])->name('api.v1.disciplinas.update');
Route::delete('disciplinas/{disciplinas}', [DisciplinaController::class, 'destroy'])->name('api.v1.disciplinas.destroy');

Route::get('deportistas/list', [DeportistaController::class, 'index'])->name('api.v1.deportistas.index');
Route::post('deportistas/store', [DeportistaController::class, 'salida'])->name('api.v1.deportistas.store');
Route::get('deportistas/{id}', [DeportistaController::class, 'show'])->name('api.v1.deportistas.show');
Route::put('deportistas/{deportistas}', [DeportistaController::class, 'update'])->name('api.v1.deportistas.update');
Route::delete('deportistas/{deportistas}', [DeportistaController::class, 'destroy'])->name('api.v1.deportistas.destroy');




