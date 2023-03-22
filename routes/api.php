<?php

use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FecharChamadoController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UltChamadosController;
use App\Http\Controllers\UsuariosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
    'usuarios' => UsuariosController::class,
    'ultChamados' => UltChamadosController::class,
    'status' => StatusController::class,
    'fecharChamado' => FecharChamadoController::class,
    'departamento' => DepartamentoController::class,
    'chamado' => ChamadoController::class
]);
