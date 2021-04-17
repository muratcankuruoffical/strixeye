<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonPossessor extends Model
{
    use HasFactory;
    protected $table = "pokemon_has_possessors";
    protected $fillable = ['pokemon_id', 'possessor_id'];
}
