<?php

use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FecharChamadoController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UltChamadosController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    
    Route::resources([
        'usuarios' => UserController::class,
        'ultChamados' => UltChamadosController::class,
        'status' => StatusController::class,
        'fecharChamado' => FecharChamadoController::class,
        'departamento' => DepartamentoController::class,
        'chamado' => ChamadoController::class
    ]);

    Route::post('/logout', [UserController::class, 'logout']);

});

Route::get('/validate-token', function () {
    return ['data' => true];
})->middleware('auth:api');
