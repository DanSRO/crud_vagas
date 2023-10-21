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
Route::get('candidatos', [CandidatoController::class, 'index'])->name('candidatos.index');
Route::get('candidatos/create', [CandidatoController::class, 'create'])->name('candidatos.create');
Route::post('candidatos/store', [CandidatoController::class, 'store'])->name('candidatos.store');
Route::get('candidatos/{candidato}', [CandidatoController::class, 'show'])->name('candidatos.show');
Route::get('candidatos/{candidato}/edit', [CandidatoController::class, 'edit'])->name('candidatos.edit');
Route::put('candidatos/{candidato}', [CandidatoController::class, 'update'])->name('candidatos.update');
Route::delete('candidatos/{candidato}', [CandidatoController::class, 'destroy'])->name('candidatos.destroy');


Route::resource('candidatos', CandidatoController::class);
Route::get('candidatos', [CandidatoController::class, 'index'])->name('candidatos.index');
Route::get('candidatos/create', [CandidatoController::class, 'create'])->name('candidatos.create');
Route::post('candidatos/store', [CandidatoController::class, 'store'])->name('candidatos.store');
Route::get('candidatos/{candidato}', [CandidatoController::class, 'show'])->name('candidatos.show');
Route::get('candidatos/{candidato}/edit', [CandidatoController::class, 'edit'])->name('candidatos.edit');
Route::put('candidatos/{candidato}', [CandidatoController::class, 'update'])->name('candidatos.update');
Route::delete('candidatos/{candidato}', [CandidatoController::class, 'destroy'])->name('candidatos.destroy');