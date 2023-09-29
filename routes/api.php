<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Candidato;
use App\Http\Controllers\CandidatoController;

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
    Route::get('/{id}', [CandidatoController::class, 'show']);
    Route::put('/{id}', [CandidatoController::class, 'update']);
    Route::delete('/{id}', [CandidatoController::class, 'destroy']);
});
