<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Possessor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'picture', 'age', 'score'];

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class, 'pokemon_has_possessors');
    }
}
