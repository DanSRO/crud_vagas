<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\CandidatoController;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the API']);
});

Route::apiResource('vagas', VagaController::class);
Route::apiResource('candidatos', CandidatoController::class);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});