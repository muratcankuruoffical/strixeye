<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Pokemon;
use App\Models\PokemonPossessor;
use App\Models\Possessor;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonPossessorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PokemonPossessor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pokemon_id' => Pokemon::all()->random()->id,
            'possessor_id' => Possessor::all()->random()->id
        ];
    }
}
