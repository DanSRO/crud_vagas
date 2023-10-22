<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\CandidatoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vagas', VagaController::class);
Route::get('vagas', [VagaController::class, 'index'])->name('vagas.index');
Route::get('vagas/create', [VagaController::class, 'create'])->name('vagas.create');
Route::post('vagas/store', [VagaController::class, 'store'])->name('vagas.store');
Route::get('vagas/{vaga}', [VagaController::class, 'show'])->name('vagas.show');
Route::get('vagas/{vaga}/edit', [VagaController::class, 'edit'])->name('vagas.edit');
Route::put('vagas/{vaga}', [VagaController::class, 'update'])->name('vagas.update');
Route::delete('vagas/{vaga}', [VagaController::class, 'destroy'])->name('vagas.destroy');

Route::post('vagas/{vaga}/pausar', [VagaController::class, 'pausar'])->name('vagas.pausar');
Route::post('vagas/{vaga}/reativar', [VagaController::class, 'reativar'])->name('vagas.reativar');

Route::resource('candidatos', CandidatoController::class);
Route::get('candidatos', [CandidatoController::class, 'index'])->name('candidatos.index');
Route::get('candidatos/create', [CandidatoController::class, 'create'])->name('candidatos.create');
Route::post('candidatos/store', [CandidatoController::class, 'store'])->name('candidatos.store');
Route::get('candidatos/{candidato}', [CandidatoController::class, 'show'])->name('candidatos.show');
Route::get('candidatos/{candidato}/edit', [CandidatoController::class, 'edit'])->name('candidatos.edit');
Route::put('candidatos/{candidato}', [CandidatoController::class, 'update'])->name('candidatos.update');
Route::delete('candidatos/{candidato}', [CandidatoController::class, 'destroy'])->name('candidatos.destroy');