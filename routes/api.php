<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\VagaController;

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

Route::prefix('candidato')->group(function(){
    Route::get('/', [CandidatoController::class, 'index']);
    Route::post('/', [CandidatoController::class, 'store']);
    Route::get('/{IdCandidato}', [CandidatoController::class, 'show']);
    Route::put('/{IdCandidato}', [CandidatoController::class, 'update']);
    Route::delete('/{IdCandidato}', [CandidatoController::class, 'destroy']);
    Route::post('/candidatar', [CandidatoController::class, 'candidatar']);
    Route::get('/{IdCandidato}/oportunidades', [CandidatoController::class, 'match']);
});


Route::prefix('vaga')->group(function(){
    Route::get('/', [VagaController::class, 'index']);
    Route::post('/', [VagaController::class, 'store']);
    Route::get('/{id}', [VagaController::class, 'show']);
    Route::put('/{id}', [VagaController::class, 'update']);
    Route::delete('/{id}', [VagaController::class, 'destroy']);
});
