<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonHasPossessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #Possessors <-> Pokemons => Many to Many Relation
        Schema::create('pokemon_has_possessors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pokemon_id');
            $table->unsignedBigInteger('possessor_id');
            $table->foreign('pokemon_id')->references('id')->on('pokemons');
            $table->foreign('possessor_id')->references('id')->on('possessors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_has_possessors');
    }
}
