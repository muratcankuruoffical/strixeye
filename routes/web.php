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


Route::group(['prefix' => 'users'], function () {
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'login']);
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('user.login');
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'register']);
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'register'])->name('user.register');
});
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');
    Route::resource('possessors', \App\Http\Controllers\PossessorController::class);
    Route::post('possessors/add/pokemon', [
        \App\Http\Controllers\PossessorController::class,
        'assignPokemonToPossessor'
    ])->name('assign_pokemon_to_possessor');
    Route::get('possessors/{possessor}/remove/pokemon/{pokemon}', [
        \App\Http\Controllers\PossessorController::class,
        'removePossessorFromPokemon'
    ])->name('remove_pokemon_from_possessor');;
    Route::resource('pokemons', \App\Http\Controllers\PokemonController::class);
    Route::post('pokemons/{pokemon}/add/possessor/{possessor}', [\App\Http\Controllers\PokemonController::class, 'givePokemonToPossessor']);
    Route::post('pokemons/{pokemon}/remove/possessor/{possessor}', [\App\Http\Controllers\PokemonController::class, 'removePokemonFromPossessor']);
});
