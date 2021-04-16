<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $table = "pokemons";
    protected $fillable = ['name', 'picture', 'age', 'height', 'evolves_from', 'evolves_to', 'weakness', 'ability'];
}
