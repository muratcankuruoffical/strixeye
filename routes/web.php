<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::group(['prefix' => 'auth'], function () {
});
*/

Route::resource('possessors', \App\Http\Controllers\PossessorController::class);
Route::post('possessors/add/pokemon', [\App\Http\Controllers\PossessorController::class, 'assignPokemonToPossessor']);
Route::post('possessors/remove/pokemon', [\App\Http\Controllers\PossessorController::class, 'removePossessorFromPokemon']);
Route::resource('pokemons', \App\Http\Controllers\PokemonController::class);
Route::post('pokemons/add/possessor', [\App\Http\Controllers\PokemonController::class, 'givePokemonToPossessor']);
Route::post('pokemons/remove/possessor', [\App\Http\Controllers\PokemonController::class, 'removePokemonFromPossessor']);
